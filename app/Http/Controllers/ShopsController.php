<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ShopsController extends Controller
{

    /**
     * Display a listing of the shops.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $shops = Shop::with('category')->paginate(25);

        return view('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new shop.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        
        return view('shops.create', compact('categories'));
    }

    /**
     * Store a new shop in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Shop::create($data);

            return redirect()->route('shops.shop.index')
                             ->with('success_message', 'Shop was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified shop.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $shop = Shop::with('category')->findOrFail($id);

        return view('shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified shop.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('shops.edit', compact('shop','categories'));
    }

    /**
     * Update the specified shop in the storage.
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
            
            $shop = Shop::findOrFail($id);
            $shop->update($data);

            return redirect()->route('shops.shop.index')
                             ->with('success_message', 'Shop was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified shop from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $shop = Shop::findOrFail($id);
            $shop->delete();

            return redirect()->route('shops.shop.index')
                             ->with('success_message', 'Shop was successfully deleted!');

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
            'category_id' => 'nullable',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
