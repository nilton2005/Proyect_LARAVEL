@extends('admin.master')
@section('title', 'Modulo de Sliders ')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/sliders')}}">
        <i class="fa-solid fa-sliders"></i>  Sliders</a>
</li>


@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel shadow">
                <div class="header">
                <h2 class="title"><i class="fa-solid fa-paintbrush"></i> Editar Sliders</h2>

                </div>
                <div class="inside">
                {{-- RUTA para crud --}}
                    {!!Form::open(['url'=>'/admin/slider/'.$slider->id.'/edit'])!!}
                    <label for="name">Nombre:</label>
                    <div class="input-group  ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::text('name',$slider->name,['class'=>'form-control'])!!}
                        
                    </div>


                    <label for="module" class='mtop16'>Activar:</label>
                    <div class="input-group">
                          <span class="input-group-text" id="basic-addon1" ><i class="fa-regular fa-pen-to-square"></i></span>

                          {!!form::select('activado',['0'=>'No activo', '1'=>'Activo'],$slider->status,['class'=>'form-select'])!!}                    
                    </div>

                    <label  for="img" class="mtop16">Imagen:</label>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{url('/uploads/'.$slider->file_path.'/'.$slider->file_name)}}" class="img-fluid" alt="Imgen destacada">
                        </div>
                     
                    </div>
        
                    <label for="name"class='mtop16'>Descripcion:</label>
                    <div class="input-group ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::textarea('content',html_entity_decode($slider->content),['class'=>'form-control', 'rows'=>'4'])!!}
                    </div>
                    <label for="name" class="mtop16">Orden de apareción:</label>
                    <div class="input-group ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::number('sorder',$slider->sorder,['class'=>'form-control ', 'min'=>'0'])!!}
                    </div>


                    @if(kvfj(Auth::user()->permissions, 'slider_edit'))
                        {!!Form::submit('Guardar', ['class'=>'btn btn-success mtop16'])!!}
                    {!!Form::close()!!}
                    @endif
       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection