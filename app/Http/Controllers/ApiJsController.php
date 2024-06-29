<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Product;
use Illuminate\Support\Facades\Config;
use App\Http\Models\Favorite;
use Illuminate\Support\Facades\Auth;



class ApiJsController extends Controller
{
    //getProductsSection
    public function __construct(){
        $this->middleware('auth')->except(['getProductsSection']);
    }
    function getProductsSection($section,Request $request){
        $items_x_page = Config::get('marketplace.product_per_paginate');
        switch($section):
            case 'home':
                $products = Product::where('status',1)->inRandomOrder()->paginate($items_x_page);
                break;
            default:
                $products = Product::where('status',1)->inRandomOrder()->paginate($items_x_page);
                break;
            endswitch;

            return $products;

    }
    function postFavoriteAdd($object, $module, Request $request){
        // Evitamos la duplicidad
        $query = Favorite::where('user_id',Auth::id())->where('module',$module)->where('object_id',$object)->count();
        if($query > 0):
            $data = ['status'=>'error', 'smg'=>'El producto ya se encuentra en sus favoritos']; 
        else:
            $favorite = new Favorite;
            $favorite->user_id = Auth::id();
            $favorite->module = $module;
            $favorite->object_id = $object;
            if($favorite->save()):
                $data = ['status'=>'success', 'smg'=>'Que bueno que te guste'];
                
            endif;
        endif;

        return response()->json($data);

    }
}
