<?php

namespace App\Http\Controllers;

use App\Http\Models\Category;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //
    public function getHome(){
        // Traer categoria
        $categories = Category::where('module',0)->orderBy('name','Asc')->get();
        $data = ['categories'=>$categories];
        return view('home',$data);
    }

}
