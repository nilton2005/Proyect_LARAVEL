@extends('admin.master')

@section('title', 'Categorias')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/categories/0')}}">
        <i class="fa-regular fa-folder"></i> Categorias</a>
</li>
<li class="breadcrumb-item">
    <a href="#">
        <i class="fa-regular fa-folder"></i> Categorias: {{$category->name}}</a>
</li>
<li class="breadcrumb-item">
    <a href="#">
        <i class="fa-regular fa-folder"></i> Subcategorías</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title">  <i class="fa-regular fa-folder"></i> Subcategorias de <strong>{{$category->name}}</strong></h2>

                </div>
                <div class="inside">
                    <nav class="nav nav-pills ">
                    </nav>
                    <table class="table mtop16">
                        <thead>
                            <tr>
                                <td width="80" ></td>
                                <td>Nombre</td>
                                <td  width = "200"></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($category->getSubcategories as $cat)
                            <tr>
                                <td>
                                    @if(!is_null($cat->icon))
                                        <img src="{{url('/uploads/'.$cat->file_path.'/'.$cat->icon)}}" class="img-fluid" alt="Imagen de la categoria">
                                    @endif
                                </td>
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