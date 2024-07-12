<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Config;

class CategoriesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }
    public function getHome($module){
        $cats = Category::where('module', $module)->where('parent', 0)->orderBy('order', 'Asc')->get();
        $data = ['cats' => $cats, 'module' => $module];

        
        return view('admin.categories.home', $data);
    }

    public function postCategoryAdd(Request $request, $module){
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
            
            // Ubicación de guardado de icono
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('icon')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt,'',$request->file('icon')->getClientOriginalName()));
            $filename = time().'-'.$name.'.'.$fileExt;

            $c = new Category;
            $c->module = $module;
            $c->parent = $request->input('parent');
            $c->name = e($request->input('name'));
            $c->file_path = $path;
            $c->slug = Str::slug($request->input('name'));
            $c->icon = $filename;
            if($c->save()):
                if($request->hasFile('icon')):
                    $lf  = $request->icon->storeAs($path,$filename,'uploads');
                endif;
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
        'name' =>'required|max:255', 

    ];
    $messages = [
        'name.required' => 'El nombre es obligatorio',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);

    if($validator->fails()):
        return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
    else:

        $cat = Category::find($id);
        $cat->name = e($request->input('name'));
        // eliminar en caso de produccion
        $cat->slug = Str::slug($request->input('name'));
        if($request->hasFile('icon')):
            $actual_icon = $cat->icon;
            $actual_file_path = $cat->file_path;
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('icon')->getClientOriginalExtension());
            // Cambiar en caso de producción
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt,'',$request->file('icon')->getClientOriginalName()));
            $filename = time().'-'.$name.'.'.$fileExt;
            $fl = $request->icon->storeAs($path,$filename,'uploads');
            $cat->file_path = date('Y-m-d');
            $cat->icon = $filename;
            if(!is_null($actual_icon)):
                unlink($upload_path.'/'.$actual_file_path.'/'.$actual_icon);
            endif;
        endif;
        $cat->order = $request->input('order');
        if($cat->save()):
            return back()->with('message','Se guardo la nueva categoria con exito')->with('typealert','success');
        endif;
    endif;
    }

    public function getSubCategories($id){
        $cat = Category::findOrFail($id);
        $data = ['category'=>$cat];
        
        return view('admin.categories.subs_categories', $data);
    }
    

    public function getCategoryDelete($id){
        $c = Category::find($id);
        if($c->delete() ):
            return back()->with('message','Se elimino la categoria con exito')->with('typealert','success');
        endif;
    }

}