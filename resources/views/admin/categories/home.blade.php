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
                <h2 class="title"><i class="fa-solid fa-plus"></i> Agregar Categoria</h2>

                </div>
                <div class="inside">
                    {!!Form::open(['url'=>'/admin/category/add'])!!}
                    <label for="name">Nombre:</label>
                    <div class="input-group mtop16 ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::text('name',null,['class'=>'form-control '])!!}
                    </div>


                    <label for="module" class='mtop16'>Módulo:</label>
                    <div class="input-group  mtop16">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                          {{form::select('module',getModulesArray(),0,['class'=>'form-select'])}}                    
                    </div>

                    <label for="icon" class="mtop16">Ícono:</label>
                    <div class="input-group mtop16 ">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::text('icon',null,['class'=>'form-control'])!!}
                    </div>

                    @if(kvfj(Auth::user()->permissions, 'product_gallery_delete'))
                        {!!Form::submit('Guardar', ['class'=>'btn btn-success mtop16'])!!}
                        {!!Form::close()!!}
                    @endif;
       
                </div>
            </div>

    </div>
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title">  <i class="fa-regular fa-folder"></i> Categorias</h2>

                </div>
                <div class="inside">
                    <nav class="nav nav-pills ">
                        @foreach(  getModulesArray() as $m =>$k  )
                            <a class="nav-link" href="{{url('/admin/categories/'.$m)}}"><i class="fa-solid fa-bars"></i>  {{$k}}</a>
                        @endforeach
                    </nav>
                    <table class="table mtop16">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Nombre</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cats as $cat)
                            <tr>
                                <td>{!! htmlspecialchars_decode($cat->icon)!!}</td>
                                <td>{{$cat->name}}</td>
                                <td>
                                    <div class="opts">
                                            @if(kvfj(Auth::user()->permissions, 'category_edit'))
                                                <a href="{{url('/admin/category/'.$cat->id.'/edit')}}" class="edit" title="Editar" data-placement = "top" data-toggle= "tooltip"><i class="fas fa-edit"></i></a>
                                            @endif
                                            @if(kvfj(Auth::user()->permissions, 'category_delete'))
                                                <a href="{{url('/admin/category/'.$cat->id.'/delete')}}" class="delete" title="Eliminar"><i class="fas fa-trash"></i></a>
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

@endsection