@extends('admin.master')
@section('title', 'Configuraciones')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/settings')}}">
        <i class="fa-solid fa-gears"></i> Configuraciones</a>
</li>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

@endsection


@section('content')

<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fa-solid fa-gears"></i> Configuraciones</h2>
        </div>
        <div class="inside">
            {!!Form::open(['url'=>'admin/settings'])!!}
            <div class="row">
                <div class="col-md-4">
                    <label for="name"> Nombre de la tienda</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                        </span>
                        {!!Form::text('name',Config::get('marketplace.name'),['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="currency">Moneda</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                        </span>
                            {!!Form::text('currency',Config::get('marketplace.currency'),['class'=>'form-control'])!!}
                    </div>
                </div>
            

                <div class="col-md-4">
                    <label for="company_phone">Teléfono</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"></span>
                        {!!Form::number('company_phone',Config::get('marketplace.company_phone'),['class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mtop16">
                <div class="col-md-4">
                    <label for="map">Ubicaciones</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"></span>
                        {!!Form::text('map',Config::get('marketplace.map'),['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="maintenance_mode">Modo mantenimiento</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"></span>
                        {!!Form::select('maintenance_mode',['0'=>'Desactivado','1'=>'Activado'],Config::get('marketplace.maintenance_mode'),['class'=>'form-select'])!!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="product_per_page">Productos para mostrar por página</label>
                    <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" ></span>
                        {!!Form::number('product_per_paginate',Config::get('marketplace.product_per_paginate'),['class'=>'form-control' , 'min'=>1, 'required' ])!!}
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="product_per_page">Productos para mostrar por página ALEATORIAMENTE </label>
                    <div class="input-group">
                            <span class="input-group-text" id="basic-addon1" ></span>
                        {!!Form::number('product_per_paginate_random',Config::get('marketplace.product_per_paginate_random'),['class'=>'form-control', 'min'=> 1 , 'required'])!!}
                    </div>
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-md-12">
                    {!!Form::submit('Guardar',['class'=>'btn btn-success'])!!}
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection