@extends('emails.master')
@section('content')
<h1>Nueva contraseña</h1>
<p> <strong>{{$name}} </strong> te enviamos tu nueva contraseña segura</p>
<p>
No lo compartas.
</p>
{{$password}}</h2>  </p>
<p><a href="{{url('/login')}}" style="display:iline-block; background-color: #FFC300; color:#fff; padding:8px; border-radius:5%; text-decoration:none" >Iniciar sesion</a></p>

@endsection
