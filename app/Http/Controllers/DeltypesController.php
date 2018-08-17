<?php

namespace App\Http\Controllers;

use App\Models\Deltype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class DeltypesController extends Controller
{

    /**
     * Display a listing of the deltypes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deltypes = Deltype::paginate(25);

        return view('deltypes.index', compact('deltypes'));
    }

    /**
     * Show the form for creating a new deltype.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('deltypes.create');
    }

    /**
     * Store a new deltype in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Deltype::create($data);

            return redirect()->route('deltypes.deltype.index')
                             ->with('success_message', 'Deltype was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified deltype.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deltype = Deltype::findOrFail($id);

        return view('deltypes.show', compact('deltype'));
    }

    /**
     * Show the form for editing the specified deltype.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deltype = Deltype::findOrFail($id);
        

        return view('deltypes.edit', compact('deltype'));
    }

    /**
     * Update the specified deltype in the storage.
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
            
            $deltype = Deltype::findOrFail($id);
            $deltype->update($data);

            return redirect()->route('deltypes.deltype.index')
                             ->with('success_message', 'Deltype was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified deltype from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deltype = Deltype::findOrFail($id);
            $deltype->delete();

            return redirect()->route('deltypes.deltype.index')
                             ->with('success_message', 'Deltype was successfully deleted!');

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
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
