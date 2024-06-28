@extends('admin.master')
@section('title', 'Modulo de Sliders ')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/sliders')}}">
        <i class="fa-solid fa-sliders"></i> Sliders</a>
</li>


@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                <h2 class="title"><i class="fa-solid fa-plus"></i> Agregar Sliders</h2>

                </div>
                <div class="inside">
                {{-- RUTA para crud --}}
                    {!!Form::open(['url'=>'/admin/slider/add','files'=>true])!!}
                    <label for="name">Nombre:</label>
                    <div class="input-group mtop16 ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::text('name',null,['class'=>'form-control'])!!}
                        
                    </div>


                    <label for="module" class='mtop16'>Activar:</label>
                    <div class="input-group  mtop16">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                          {!!form::select('activado',['0'=>'No activo', '1'=>'Activo'],1,['class'=>'form-select'])!!}                    
                    </div>

                    <label for="icon" class="mtop16">Imagen:</label>
                    <div class="form-file">
                        {!!Form::file('img',['class'=>'form-control','id'=>'formFile','accept'=>'image/*'])!!}
                     
                    </div>
                    <label for="name"class='mtop16'>Descripcion:</label>
                    <div class="input-group ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::textarea('content',null,['class'=>'form-control', 'rows'=>'4'])!!}
                    </div>
                    <label for="name" class="mtop16">Orden de apareción:</label>
                    <div class="input-group ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::number('sorder',null,['class'=>'form-control ', 'min'=>'0'])!!}
                    </div>


                    @if(kvfj(Auth::user()->permissions, 'slider_add'))
                        {!!Form::submit('Guardar', ['class'=>'btn btn-success mtop16'])!!}
                    {!!Form::close()!!}
                    @endif
       
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                <h2 class="title"><i class="fa-solid fa-plus"></i> Agregar Sliders</h2>
                </div>
                <div class="inside" >
                    <table class="table">
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                <td width="20%">
                                    <img src="{{url('uploads/'.$slider->file_path.'/'.$slider->file_name)}}" alt="imagen del slide" class="img-fluid">
                                </td>

                                <td width="50%" >
                                    <div  class="slider_content">
                                        <h1>{{$slider->name}}</h1>
                                        {!!html_entity_decode( $slider->content)!!}
                                    </div>
                                </td>

                                <td width="50%">
                                    <div class="opts">
                                        @if(kvfj(Auth::user()->permissions, 'slider_edit'))
                                            <a href="{{url('/admin/slider/'.$slider->id.'/edit')}}" class="edit" title="Editar" data-placement = "top" data-toggle= "tooltip"><i class="fas fa-edit"></i></a>
                                        @endif
                                        
                                        @if(kvfj(Auth::user()->permissions, 'slider_delete'))
                                            <a href="#" data-path="admin/slider" data-action="delete" data-object="{{$slider->id}}"  class="btn-deleted" title="Eliminar"><i class="fas fa-trash"></i></a>
                                        @endif
                                   
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
