<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\City;
use App\Models\Shop;
use App\Models\Offre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class OffresController extends Controller
{

    /**
     * Display a listing of the offres.
     *
     * @return Illuminate\View\View
     */
    public function index2()
    {
        $offres = Offre::with('city','shop','user')->paginate(25);

        return view('welcome', compact('offres'));
    }


        /**
     * Display a listing of the offres.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $offres = Offre::with('city','shop','user')->where('user_id', '=', Auth::user()->id)->paginate(25);

        return view('offres.index', compact('offres'));
    }


    /**
     * Show the form for creating a new offre.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $cities = City::pluck('name','id')->all();
        $shops = Shop::pluck('name','id')->all();
        $users = User::pluck('name','id')->all();

        return view('offres.create', compact('cities','cities','shops','users'));
    }

    /**
     * Store a new offre in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Offre::create($data);

            return redirect()->route('offres.offre.index')
                             ->with('success_message', 'Offre was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified offre.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {

        $result = DB::table('offres')
        ->where('user_id', Auth::user()->id)
        ->where('id', $id)
        ->first();
        if($result == null){
             return;
        }

        $offre = Offre::with('city','shop','user')->findOrFail($id);

        return view('offres.show', compact('offre'));
    }

    /**
     * Show the form for editing the specified offre.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {


       $result = DB::table('offres')
       ->where('user_id', Auth::user()->id)
       ->where('id', $id)
       ->first();
       if($result == null){
            return;
       }

        $offre = Offre::findOrFail($id);
        $cities = City::pluck('name','id')->all();
        $shops = Shop::pluck('name','id')->all();
        $users = User::pluck('name','id')->all();




        return view('offres.edit', compact('offre','cities','cities','shops','users'));
    }

    /**
     * Update the specified offre in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $offre = Offre::findOrFail($id);
            $offre->update($data);

            return redirect()->route('offres.offre.index')
                             ->with('success_message', 'Offre was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified offre from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $offre = Offre::findOrFail($id);
            $offre->delete();

            return redirect()->route('offres.offre.index')
                             ->with('success_message', 'Offre was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'string|min:1|max:255|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'price' => 'string|min:1|nullable',
            'status' => 'nullable|boolean',
            'city_id' => 'nullable',
            'city_id_to' => 'nullable',
            'shop_id' => 'nullable',
            'user_id' => 'nullable',

        ];


        $data = $request->validate($rules);


        $data['status'] = $request->has('status');


        return $data;
    }

}
