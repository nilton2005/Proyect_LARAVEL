<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Config; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function getAccount(){
        return view('user.account_edit');
    }

    public function postAccountAvatar(Request $request){
        $rules = [
            'avatar'=>'required',

        ];
        $messages = [
            'Avatar.required'=>"Deve seleccionar al menos una imagen"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error. ')->with('typealert','danger')->withInput();
        else:
            if($request->hasFile('avatar')):
                $path = '/'.Auth::id();
                //Limpiar espacios para tener solo la extension
                $fileExt = trim($request->file('avatar')->getClientOriginalExtension());
                // Ruta para guardar la imagen
                $upload_path = Config::get('filesystems.disks.uploads_user.root');
                //para evitar carecteres especiales (opcional)
                $name =Str::slug(str_replace($fileExt,'', $request->file('avatar')
                ->getClientOriginalName()));
                //nombre del archivo
                $filename =   time().'_'. $name.'.'.$fileExt;
    
                $file_file = $upload_path.'/'.$path.'/'.$filename;
                $u = User::find(Auth::id());
                //Actual avatar
                $aa = $u->avatar;
                $u->avatar = $filename;


                // Save image
 
                if($u->save()):                
                    // Guardar imagen con los nomber en uploads
                    if($request->hasFile('avatar')):
                        $fl = $request->avatar->storeAs($path, $filename, 'uploads_user');
                        $img = Image::make($request->file('avatar'));
                        //tamaño de la imagen
                        $img ->fit(256,256, function($constraint){
                            $constraint->upsize();
                        });
                        $img->save($upload_path. '/'. $path.'/av_'.$filename);
    
                    endif;
                    // Eliminando avatares antiguos
                    unlink($upload_path.'/'.$path.'/'.$aa);
                    unlink($upload_path.'/'.$path.'/av_'.$aa);
                    return back()->with('message','Perfil acctualizado con exito')->with('typealert','success') ;
                endif;


            endif;

        endif;
    }
}
