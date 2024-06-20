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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error laboriosam sapiente, quasi similique cum vel nemo optio perferendis asperiores dignissimos vitae, ut eaque sunt atque rerum corporis quidem assumenda sint.
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
                    <div class="md-col-md4">
                        <label for="name">Nombre:</label>
                        <div class="input-group mtop16 ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::text('name',Auth::user()->name,['class'=>'form-control '])!!}
                        </div>
                    </div>
                    <div class="md-col-md4">
                        <label for="lastname">Apellidos :</label>
                        <div class="input-group mtop16 ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::text('lastname',Auth::user()->lastname,['class'=>'form-control '])!!}
                        </div>
                    </div>
                    <div class="md-col-md4">
                        <label for="email">Email :</label>
                        <div class="input-group mtop16 ">
                              <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
    
                            {!!Form::text('email',Auth::user()->email,['class'=>'form-control ',])!!}
                        </div>
                    </div>

                </div>
                {!!Form::close()!!}
            </div>
        </div>      
    </div>
</div>
@endsection