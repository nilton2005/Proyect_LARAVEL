@extends('connect.master')
@section('title', 'Recuperar contraseña')

@section('content')
<div class="box  box_login shadow">
    <dicv class="header">
        <a href="{{url('/')}}">
            <img src="{{url('/static/images/logo.png')}}" >
        </a>
    </dicv>
    <div class="inside">
    {!!Form:: open(['url'=> '/recover'])!!}
    <label for="email" >Correo Electrónico</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-regular fa-envelope"></i> 
        </div>
        {!!Form:: email('email', null, ['class' => 'form-control', ])!!}
    </div>


 
    
    {!!Form::submit('Recuperar contraseña', ['class' =>'btn btn-success mtop16'])!!}
    {!!Form:: close()!!}

    @if (Session::has('message'))
        <div class="container mtop16">
            <div class=" alert alert-{{Session::get('typealert')}}" style="display:none">
                {{Session::get('message')}}
                @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <script>
                    $('.alert').slideDown();
                    setTimeout(function(){$('.alert').slideUp();}, 10000);
                </script>
            </div>
        </div>
    @endif
    <div class="mtop16">
        <a href="{{url('/register')}}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> ¿No tienes una cuenta?</a>
        <a href="{{url('/login')}}" class="btn btn-primary"><i class="fa-solid fa-key"></i> Ingresar a mi cuenta</a>
    </div>
     </div>
</div>
@stop