@extends('emails.master')
@section('content')
<h1>Recuperar contraseña</h1>
<p>Hola: <strong>{{$name}} </strong></p>
<p>
¿Olvidaste tu contraseña? ¡No te preocupes! Restablecerla es fácil.
</p>
<p>Para continua presiona este boton y copie este código: <h2> {{$code}}</h2>  </p>
<p><a href="{{url('/reset')}}" style="display:iline-block; background-color: #FFC300; color:#fff; padding:8px; border-radius:5%; text-decoration:none" >Recuperar mi contraseña</a></p>

@endsection
