<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator,Illuminate\Support\Facades\Hash;
use App\Mail\UserSendRecover;
use App\Mail\UserSendNewPassword;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class ConnectController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except(['getLogout']);
    }
    public function getLogin(){
        return view('connect.login');
    }

    public function postLogin(Request $request){
        //reglas de validacion
        $rules = [
            'email' =>'required|email',
            'password' => 'required| min:5'
        ];
        //mensajes de error
        $messages = [
            'email.required' => 'Su correo es importante',
            'email.email' => 'Asegurasé que tenga xx@gmail.com',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'El campo contraseña debe tener minimo 5 caracteres'
        ];
        //validar los datos
        $validator = Validator :: make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')], true)):
                if(Auth::user()->status == "100"):
                    return redirect('/logout');
                else:
                    return redirect('/');
                endif;
            else:
                return back()->with('message','El usuario no existe o contrseña erronea')->with('typealert','danger');
            endif;
        endif;

    }
    public function getRegister(){
        return view('connect.register');
    
    }
    public function postRegister(Request $request){
        //reglas de validacion
        $rules = [
            'name' =>'required|max:20',
            'lastname' =>'required|max:50',
            'email' =>'required|email|unique:App\User,email',
            'password' =>'required | min:5',
            'cpassword' =>'required|min:5|same:password',
        ];

        //mensajes de error
        $messages = [
            'name.required' => 'Su nombre es necesario.',
            'name.max' => 'El nombre debe tener maximo 20 caracteres.',
            'lastname.required' => 'Su apellido es necesario.',
            'lastname.max' => 'El apellido debe tener maximo 50 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Asegurese de poner xxx@gmail.com.',
            'email.unique' => 'El email ya existe.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener minimo 5 caracteres.',
            'cpassword.required' => 'La confirmacion de contraseña es obligatoria.',
            'cpassword.same' => 'Las contraseñas no coinciden.',
        ];



        $validator = Validator::make($request->all(),$rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user = new User;
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            if ($user->save()):
                return redirect('login')->with('message', 'Usuario creado correctamente')->with('typealert','success');
            endif;
        endif;
    }

    public function getLogout(){
        $status = Auth::user()->status;
        Auth::logout();
        if($status == "100"):
            return redirect('/login')->with('message', "Su usuario ha sido suspendido")->with('typealert', 'danger');
        else:
            return redirect('/');
        endif;

        
            
    }


    // Recuperarar cuenta

    public function getRecover(){
        return view('connect.recover');
    }
    public function postRecover(Request $request){
        $rules = [
            'email' =>'required|email',
            
        ];

        //mensajes de error
        $messages = [
            
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Asegurese de poner xxx@gmail.com.',
        ];

        $validator = Validator :: make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user = User::where('email',$request->input('email'))->count();
            if($user == "1"):
                $user = User::where('email',$request->input('email'))->first();
                $code = rand(100000,9999);
                $data = ['name'=>$user->name, 'email'=>$user->email, 'code'=>$code];
                // Comparando token 
                $u = User::find($user->id);
                $u->password_code = $code;
                if($u->save()):
                    Mail::to($user->email)->send(new UserSendRecover($data));
                    return redirect('/reset?email='.$user->email)->with('message','Enviamos un token a su correo')->with('typealert','success');
                endif;
            else:
                return back()->with('message','El usuario no existe')->with('typealert','danger');

            endif;
            
        endif;

    }
    public function getReset(Request $request){
        $data = ['email' => $request->get('email')];
        return view('connect.reset',$data);
    }
    public function postReset(Request $request){
        $rules = [
            'email' =>'required|email',
            'code' => 'required'
        ];
        //mensajes de error
        $messages = [
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Asegurese del formato de su correo',
            'code.required' => 'Deve ingresar el codigo que le enviamos'
        ];
        $validator = Validator :: make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user = User::where('email',$request->input('email'))->where('password_code',$request->input('code'))->first();
            if($user):
                $new_password = Str::random(8);
                $user->password = Hash::make($new_password);
                $user->password_code = null;

                if($user->save()):
                    $data = ['name'=>$user->name, 'password'=>$new_password];
                    Mail::to($user->email)->send(new UserSendNewPassword($data));
                    return redirect('/login')->with('message', 'Enviamos la nueva contraseña a su correo')->with('typealert','success');
                endif;


            else:
                return back()->with('message','El correo no existe o el código es incorrecto')->with('typealert','danger');
            endif;
        endif;
    }
}
