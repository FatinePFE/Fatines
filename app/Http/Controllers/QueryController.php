<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Offre;
use App\Models\City;
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
        $cities = City::paginate(25);


        return view('welcome', compact('shops', 'cities'));
    }


    public function search(Request $request) {

        $mot = $request->mot;
        $shop_id = $request->shop_id;
        $city_id = $request->city_id;
        $shops = Shop::with('category')->paginate(25);
        $cities = City::paginate(25);


        if($shop_id != "" && $city_id != ""){
            $offre = Offre::where ( 'shop_id', '=', $shop_id )->where ( 'city_id', '=', $city_id )->get ();
        } else if($shop_id != ""){
            $offre = Offre::where ( 'shop_id', '=', $shop_id )->get ();
        } else if( $city_id != ""){
            $offre = Offre::where ( 'city_id', '=', $city_id )->get ();
        } else {
            $offre = Offre::get ();
        }

        if (count ( $offre ) > 0)
            return view ( 'welcome' ,compact('shops','cities','shop_id','city_id'))->withDetails ( $offre );
        else
            return view ( 'welcome' ,compact('shops','cities','shop_id','city_id'))->withMessage ( 'No Details found. Try to search again !' );

    }


}
