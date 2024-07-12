<?php

namespace App\Http\Controllers;

use App\Http\Models\Category;
use Illuminate\Http\Request;
use App\Http\Models\Slider;

class ContentController extends Controller
{
    //
    public function getHome(){
        // Traer categoria
        $categories = Category::where('module',0)->where('parent','0')->orderBy('order','Asc')->get();
        $sliders = Slider::where('status',1)->orderBy('sorder','Asc')->get();
        $data = ['categories'=>$categories, 'sliders' => $sliders];
        return view('home',$data);
    }

}
