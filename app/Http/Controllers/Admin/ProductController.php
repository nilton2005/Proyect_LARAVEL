<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;
use App\Http\Models\PGallery;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
//importa la clase de validación


//importan la clase Image
use Intervention\Image\ImageManagerStatic as Image;
//importa la clase de validación
class ProductController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    public function getHome(){
        $products = Product::with(['cat'])->orderBy('id', 'desc')->paginate(25);
        $data = ['products'=> $products];
        return view('admin.products.home', $data);
    }

    public function getProductAdd(){
        // llamamos a la BD para traer las categorias
        $cats = Category::where('module','0')->pluck('name','id');
        $data  = ['cats'=> $cats];
        return view('admin.products.add', $data);
    }

    public function postProductAdd(Request $request){
        $rules = [
            'name' =>'required',
            'price' =>'required|numeric',
            'img' =>'required',//'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' =>'required',
           
        ];
        $messages = [
            'name.required'=>'El nombre del producto es obligatorio',
            'price.required'=>'El precio del producto es obligatorio',
            'price.numeric'=>'El precio del producto debe ser un numero',
            'img.required'=>'La imagen del producto es obligatoria',
            //'img.image'=>'La imagen debe ser una imagen',
            //'img.mimes'=>'La imagen debe ser formato jpeg,png,jpg,gif,svg',
            //'img.max'=>'La imagen debe pesar menos de 2048 kilobytes',
            'content.required'=>'La descripcion del producto es obligatorio',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            // Guardar imagen
            $path = '/'.date('Y-m-d');
            //Limpiar espacios para tener solo la extension
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            // Ruta para guardar la imagen
            $upload_path = Config::get('filesystems.disks.uploads.root');
            //para evitar carecteres especiales
            $name = Str::slug(str_replace($fileExt,'', $request->file('img')
            ->getClientOriginalName()));
            //nombre del archivo
            $filename =   time().'_'. $name.'.'.$fileExt;

            $file_file = $upload_path.'/'.$path.'/'.$filename;


        
             

            $product = new Product;
            // Solo se ve en la BD 0=BD y 1=Web
            $product->status = '0';
            $product->name = e($request->input('name'));
            $product->slug = Str::slug($request->input('name'));
            $product->category_ID = $request->input('category');
            $product->file_path = date('Y-m-d');
            $product->image = $filename ;
            $product->price = e($request->input('price'));
            $product->in_discount = e($request->input('indiscount'));
            $product->discount = e($request->input('discount'));
            $product->content = e($request->input('content'));
            if($product->save()):
                // Guardar imagen con los nomber en uploads
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img =Image::make($file_file);
                    //tamaño de la imagen
                    $img ->fit(256,256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path. '/'. $path.'/t_'.$filename);
                //return redirect('admin/products')->with('message','Producto agregado con exito')->with('typealert','success') ;
                //return redirect('admin/products')->with('message','Producto agregado con exito')->with('typealert','success'

                endif;
                return redirect('admin/products')->with('message','Producto agregado con exito')->with('typealert','success') ;
            endif;
        endif;

    }

    public function getProductEdit($id){
        $p = Product::findOrFail($id);
        $cats = Category::where('module','0')->pluck('name','id');
        $data  = ['cats'=> $cats, 'p'=>$p];
        return view('admin.products.edit', $data);
        # $product :: find($id);
    }

    public function postProductEdit($id, Request $request){
        $rules = [
            'name' =>'required',
            'price' =>'required|numeric',
            'content' =>'required',
           
        ];
        $messages = [
            'name.required'=>'El nombre del producto es obligatorio',
            'price.required'=>'El precio del producto es obligatorio',
            'price.numeric'=>'El precio del producto debe ser un numero',
            'content.required'=>'La descripcion del producto es obligatorio',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $product = Product::findOrFail($id);
            // Solo se ve en la BD 0=BD y 1=Web
            $product->status = $request->input('status');
            $product->name = e($request->input('name'));
            //$product->slug = Str::slug($request->input('name'));
            $product->category_ID = $request->input('category');
            if($request->hasFile('img')):
                $path = '/'.date('Y-m-d');
                //Limpiar espacios para tener solo la extension
                $fileExt = trim($request->file('img')->getClientOriginalExtension());
                // Ruta para guardar la imagen
                $upload_path = Config::get('filesystems.disks.uploads.root');
                //para evitar carecteres especiales
                $name = Str::slug(str_replace($fileExt,'', $request->file('img')
                ->getClientOriginalName()));
                //nombre del archivo
                $filename =   time().'_'. $name.'.'.$fileExt;
    
                $file_file = $upload_path.'/'.$path.'/'.$filename;
    
                $product->file_path = date('Y-m-d');
                $product->image = $filename ;
            endif;
            $product->price = e($request->input('price'));
            $product->in_discount = e($request->input('indiscount'));
            $product->discount = e($request->input('discount'));
            $product->content = e($request->input('content'));
            if($product->save()):                
                // Guardar imagen con los nomber en uploads
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img =Image::make($file_file);
                    //tamaño de la imagen
                    $img ->fit(256,256, function($constraint){
                        $constraint->upsize();
                    });
                    $img->save($upload_path. '/'. $path.'/t_'.$filename);

                endif;
                return back()->with('message','Producto actualizado con exito')->with('typealert','success') ;
            endif;
        endif;
    }


    public function postProductGalleryAdd($id, Request $request){
        $rules = [
            'file_image'=>'required',

        ];
        $messages = [
            'file_image.required'=>"Deve seleccionar al menos una imagen"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error. ')->with('typealert','danger')->withInput();
        else:
            if($request->hasFile('file_image')):
                $path = '/'.date('Y-m-d');
                //Limpiar espacios para tener solo la extension
                $fileExt = trim($request->file('file_image')->getClientOriginalExtension());
                // Ruta para guardar la imagen
                $upload_path = Config::get('filesystems.disks.uploads.root');
                //para evitar carecteres especiales
                $name = Str::slug(str_replace($fileExt,'', $request->file('file_image')
                ->getClientOriginalName()));
                //nombre del archivo
                $filename =   time().'_'. $name.'.'.$fileExt;
    
                $file_file = $upload_path.'/'.$path.'/'.$filename;
    
                $g = new PGallery;
                $g ->product_id = $id;
                $g ->file_path = date('Y-m-d');
                $g->file_name = $filename;

                // Save image
 
                if($g->save()):                
                    // Guardar imagen con los nomber en uploads
                    if($request->hasFile('file_image')):
                        $fl = $request->file_image->storeAs($path, $filename, 'uploads');
                        $img =Image::make($file_file);
                        //tamaño de la imagen
                        $img ->fit(256,256, function($constraint){
                            $constraint->upsize();
                        });
                        $img->save($upload_path. '/'. $path.'/t_'.$filename);
    
                    endif;
                    return back()->with('message','Imagen subida con exito')->with('typealert','success') ;
                endif;


            endif;

        endif;
    }

}
