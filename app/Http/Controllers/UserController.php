<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Config; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    public function postAccountPassword(Request $request){
        $rules = [
            'apassword' => 'required',
            'password' => 'required|min:5',
            'cpassword' => 'required|min:5|same:password'
        ];
        $messages = [
            'apassword.required' =>'Deve ingresar su contraseña actual es incorrecta',
            'password.required' =>'Debe ingresar la nueva contraseña',
            'password.min' => 'La nueva contraseña deve tener minmo 5 caracteres',
            'cpassword.required' => 'La confimacion deve tener minimo 5 caracteres',
            'cpassword.min' => 'La nueva contrasea deve tener minimo 5 caracteres',
            'cpassword.same' => 'Asegurese que  las contraseñas sean iguales al campo anterior ',
        ];
        $validator = validator::make($request->all(),$rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Ocurrió un error.')->with('typealert','danger')->withInput();
        else:
            $u = User::find(Auth::id());
            // Revisamos si las contraseñas de la BD conciden con la del input
            if(Hash::check($request->input('apassword'),$u->password)):
                $u->password = Hash::make($request->input('password'));
            if($u->save()):
                return back()->with('message', 'Se guardo correctamente su nueva contraseña')->with('typealert','success');
            endif;
            else:
                return back()->withErrors($validator)->with('message','Por favor ingresa la contraseña actual de su cuenta')->with('typealert','danger');
            endif;
        endif;
    }


    public function postAccountInfo(Request $request){
        $adultDate = now()->subYears(19)->format('Y-m-d');

        $rules=[
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'email|required',
            'phone' => 'required|min:9',
            'birthday' => "required|before:$adultDate",
            'gender' => 'required',
        ];
        $messages=[
            'name.required' => 'El nombre es importante',
            'name.min' => 'El nombre deve tener minimo 3 caracteres',
            'lastname.required' =>'Su apellido es importante',
            'lastname.min' => 'El apellido deve tener ms de 3 carecteres',
            'email.required' => 'Es necesario su correo',
            'email.email' => 'Deve insertar un email válido',
            'phone.required'=>'Su telefono es nesesario',
            'phone.min' => 'Deve insertar un número válido',
            'birthday.required' => 'La fecha de nacimiento es importante',
            'birthday.before' => 'Solo se permiten mayores de 18 años',
            'gender.required' => 'El género es importante'
        ];

        $validator = validator::make($request->all(), $rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Ocurrio un error.')->with('typealert','danger')->withInput();
        else:
            $u = User::find(Auth::id());
            $u->name = e($request->input('name'));
            $u->lastname = e($request->input('lastname'));
            $u->phone = e($request->input('phone'));
            $u->birthday = e($request->input('birthday'));
            $u->gender = e($request->input('gender'));
            if($u->save()):
                return back()->with('message','Su información se actutalizó con exito.')->with('typealert','success');
            endif;
        endif;

    }


}
