<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Offre;
use Exception;

class QueryController extends Controller
{


    /**
     * Display a listing of the offres.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $offres = Offre::with('city','shop','user')->paginate(25);
        $shops = Shop::with('category')->paginate(25);


        return view('welcome', compact('shops'));
    }


    public function search(Request $request) {

        $mot = $request->mot;
        $shop_id = $request->shop_id;
        $shops = Shop::with('category')->paginate(25);


        if($shop_id != ""){
            $offre = Offre::where ( 'shop_id', '=', $shop_id )->get ();
            if (count ( $offre ) > 0)
                return view ( 'welcome' ,compact('shops'))->withDetails ( $offre )->withQuery ( $shop_id );
            else
                return view ( 'welcome' ,compact('shops'))->withMessage ( 'No Details found. Try to search again !' );
        }
        return view ( 'welcome' , compact('shops'))->withMessage ( 'No Details found. Try to search again !' );
    }


}
