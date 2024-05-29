<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function getHome($module){
        $cats = Category::where('module', $module)->orderBy('name', 'Asc')->get();
        $data = ['cats'=>$cats];
        
        return view('admin.categories.home', $data);
    }

    public function postCategoryAdd(Request $request){
        $rules = [
            'name' =>'unique:categories,name|required|max:255', 
            'icon' =>'required',

        ];
        $messages = [
            'name.unique' => 'El nombre ya existe',
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre no puede superar los 255 caracteres',
            'icon.required' => 'El ícono es obligatorio',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:

            $c = new Category;
            $c->module = $request->input('module');
            $c->name = e($request->input('name'));
            $c->slug = Str::slug($request->input('name'));
            $c->icon = e($request->input('icon'));
            if($c->save()):
                return back()->with('message','Se guardo la nueva categoria con exito')->with('typealert','success');
            endif;


        endif;
    }
//revivosmo editar categoria por meidio del route para la edicion
    public function getCategoryEdit($id){
        $cat = Category::find($id);
        $data = ['cat'=>$cat];
        return view('admin.categories.edit', $data);
    }


        public function postCategoryEdit(Request $request,$id){
        $rules = [
            'name' =>'unique:categories,name|required|max:255', 
            'icon' =>'required',

        ];
        $messages = [
            'name.unique' => 'El nombre ya existe',
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'El nombre no puede superar los 255 caracteres',
            'icon.required' => 'El ícono es obligatorio',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:

            $cat = Category::find($id);
            $cat->module = $request->input('module');
            $cat->name = e($request->input('name'));
            // eliminar en caso de produccion
            $cat->slug = Str::slug($request->input('name'));
            $cat->icon = e($request->input('icon'));
            if($cat->save()):
                return back()->with('message','Se guardo la nueva categoria con exito')->with('typealert','success');
            endif;
        endif;
    }

    public function getCategoryDelete($id){
        $c = Category::find($id);
        if($c->delete() ):
            return back()->with('message','Se elimino la categoria con exito')->with('typealert','success');
        endif;
    }

}