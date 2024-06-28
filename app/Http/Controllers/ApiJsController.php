<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Product;
use Illuminate\Support\Facades\Config;



class ApiJsController extends Controller
{
    //getProductsSection
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
}
