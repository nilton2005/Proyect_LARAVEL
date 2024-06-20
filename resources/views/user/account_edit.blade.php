@extends('master')
@section('title', 'Mi cuenta')
@section('content')
<div class="row mtop32">
    <div class="col-md-4">
        <div class="panel shadow">
            <div class="header">
            <h2 class="title"><i class="fa-solid fa-user-pen"></i> Editar mi perfil</h2>
            </div>
            <div class="inside">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error laboriosam sapiente, quasi similique cum vel nemo optio perferendis asperiores dignissimos vitae, ut eaque sunt atque rerum corporis quidem assumenda sint.
            </div>
        </div>
        <div class="panel shadow mtop32">
            <div class="header">
            <h2 class="title"> <i class="fa-solid fa-bolt"></i>Cambiar mi contraseña</h2>
            </div>
            <div class="inside">
                {!!Form::open(['url'=>'/account/edit/password'])!!}
                <div class="row mtop16">
                    <div class="col-md-12">
                        <label for="name">Contraseña Actual:</label>
                        <div class="input-group  ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::password('apassword',null,['class'=>'form-control '])!!}
                        </div>
                    </div>
                </div>
                <div class="row mtop16">
                    <div class="col-md-12">
                        <label for="name"> Nueva Contraseña:</label>
                        <div class="input-group  ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::password('password',null,['class'=>'form-control '])!!}
                        </div>
                    </div>
                </div>
                <div class="row mtop16">
                    <div class="col-md-12">
                        <label for="name">Confirmar Contraseña:</label>
                        <div class="input-group  ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::password('password',null,['class'=>'form-control '])!!}
                        </div>
                    </div>
                </div>
                <div class="row mtop16">
                    <div class="col-md-12">
                       
                        {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
                        
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>

    </div>
    <div class="col-md-8">
        <div class="panel shadow">
            <div class="header">
            <h2 class="title"><i class="fa-solid fa-circle-info"></i> Editar mi información</h2>
            </div>
            <div class="inside">
                {!!Form::open(['url'=>'/account/edit/info'])!!}
                <div class="row">
                    <div class="md-col-md4 mtop16">
                        <label for="name">Nombre:</label>
                        <div class="input-group  ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::text('name',Auth::user()->name,['class'=>'form-control '])!!}
                        </div>
                    </div>
                    <div class="md-col-md4 mtop16 ">
                        <label for="lastname">Apellidos :</label>
                        <div class="input-group  ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::text('lastname',Auth::user()->lastname,['class'=>'form-control '])!!}
                        </div>
                    </div>
                    <div class="md-col-md4 mtop16">
                        <label for="email">Email :</label>
                        <div class="input-group  ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::text('email',Auth::user()->email,['class'=>'form-control ',])!!}
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="md-col-md4 mtop16">
                        <label for="email">Teléfono :</label>
                        <div class="input-group ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::number('phone',Auth::user()->phone,['class'=>'form-control ',])!!}
                        </div>
                    </div>
                    <div class="col-md-8 mtop16">
                        <label for="module">Fecha de nacimiento:  Año  -  Mes - Día</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                            </span>
                            {!! Form::date('fecha_nacimiento', \Carbon\Carbon::now()->subYears(18), ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mtop16">
                        <label for="module">Genero: </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                            </span>
                            {!!Form::select('gender', ['0'=>'Sin especificar', '1'=>'Hombre', '3'=>'Mujer'],null,['class'=>'form-select'])!!}
             
                        </div>
                    </div>                  
                </div>
                <div class="row mtop16">
                    <div class="col-md-12">
                        {!!form::submit('enviar',['class'=>"btn btn-primary"]  )!!}
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>      
    </div>
</div>
@endsection