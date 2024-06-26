@extends('admin.master')

@section('title', 'Categorias')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/categories')}}">
        <i class="fa-regular fa-folder"></i> Categorias</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                <h2 class="title"><i class="fas fa-edit"></i> Editar Categoria</h2>

                </div>
                <div class="inside">
                {{--Acciones que del formulario de edición de categorias  --}} 
                    {!!Form::open(['url'=>'/admin/category/'.  $cat->id.' /edit', 'files'=>true])!!}
                    <label for="name">Nombre:</label>
                    <div class="input-group mtop16 ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::text('name',$cat->name,['class'=>'form-control '])!!}
                    </div>


                    <label for="module" class='mtop16'>Módulo:</label>
                    <div class="input-group  mtop16">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                          {{form::select('module',getModulesArray(),$cat->module,['class'=>'form-select'])}}                    
                    </div>

                    <label for="icon" class="mtop16">Ícono:</label>
                    <div class="form-file">
                        {!!Form::file('icon',['class'=>'form-control','id'=>'formFile','accept'=>'image/*'])!!}
                     
                    </div>


                    {!!Form::submit('Guardar', ['class'=>'btn btn-success mtop16'])!!}
                    {!!Form::close()!!}
       
                </div>
            </div>

        </div>
        @if(!is_null($cat->icon))
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-edit"></i>Icono</h2>
                    </div>
                    <div class="inside">
                        <img src="{{url('/uploads/'.$cat->file_path.'/'.$cat->icon)}}" class="img-fluid" alt="Imagen de categoria" width="75%">
                    </div>
                </div>
            </div>
        @endif

    
    

    </div>
</div>

@endsection