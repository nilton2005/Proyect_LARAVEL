@extends('connect.master')
<!-- register.blade.php -->
<!-- ... -->


@section('title', 'Registrarse')

@section('content')
<div class="box  box_register shadow">
    <dicv class="header">
        <a href="{{url('/')}}">
            <img src="{{url('/static/images/logo.png')}}" >
        </a>
    </dicv>
    <div class="inside">
    {!!Form:: open(['url'=> '/register'])!!}

    
    <label for="name" >Nombre: </label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-regular fa-user"></i>
        </div>
        {!!Form:: text('name', null, ['class' => 'form-control', 'required'])!!}
    </div>


    <label for="lastname" >Apellido: </label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-solid fa-user-tag"></i> 
        </div>
        {!!Form:: text('lastname', null, ['class' => 'form-control', 'required'])!!}
    </div>
    <label for="email" class="mtop16" >Correo Electrónico</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-regular fa-envelope"></i> 
        </div>
        {!!Form:: email('email', null, ['class' => 'form-control', 'required'])!!}
    </div>


    <label for="password" class= "mtop16">Contraseña</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-solid fa-lock"></i>
        </div>
        {!!Form:: password('password', null, ['class' => 'form-control', 'required'])!!}
    </div>


    <label for="password" class= "mtop16">Confirmar Contraseña</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-solid fa-lock"></i>
        </div>
        {!!Form:: password('cpassword', null, ['class' => 'form-control', 'required'])!!}
    </div>



  <div class="form-group">
    <!-- Agregado el id="vehicle_label" al elemento label -->
    <label class="mtop16" >Para poder personalizar su experiencia, puede indicarnos el tipo de su auto: Pulse <span id="vehicle_label" style="text-decoration: underline; cursor: pointer">aquí</span>
    </label>
        <div id="vehicle_details" style="display: none;">
        <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" placeholder="Ingrese el tipo de vehículo">
        
        <label for="vehicle_brand">Marca:</label>
        <input type="text" class="form-control" id="vehicle_brand" name="vehicle_brand" placeholder="Ingrese la marca del vehículo">
        <label for="vehicle_model">Modelo:</label>
        <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" placeholder="Ingrese el modelo del vehículo">
        <label for="vehicle_year">Año de fabricación:</label>
        <input type="text" class="form-control" id="vehicle_year" name="vehicle_year" placeholder="Ingrese el año de fabricación">
        <label for="vehicle_serial">Número de serie del motor:</label>
        <input type="text" class="form-control" id="vehicle_serial" name="vehicle_serial" placeholder="Ingrese el número de serie del motor">
        </div>
</div>

<script>
    document.getElementById('vehicle_label').addEventListener('click', function() {
        var vehicleDetails = document.getElementById('vehicle_details');
        if (vehicleDetails.style.display === 'none') {
            vehicleDetails.style.display = 'block';
        } else {
            vehicleDetails.style.display = 'none';
        }
    });
</script>



    
    
    {!!Form::submit('Registrarse', ['class' =>'btn btn-success mtop16'])!!}
    {!!Form:: close()!!}

    @if (Session::has('message'))
        <div class="container">
            <div class=" mtop16 alert alert-{{Session::get('typealert')}}" style="display:none">
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






    <div class="footer mtop16">
        <a href="{{url('/login')}}" class="btn btn-primary"><i class="fa fa-home"></i> Ya tengo una cuenta, ingresar</a>

    </div>

     </div>
</div>
@stop