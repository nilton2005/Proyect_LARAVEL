
@extends('admin.master')
@section('title', 'Products')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/products')}}">
        <i class="fas fa-solid fa-store"></i> Productos</a>
</li>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

@endsection


@section('content')

<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-solid fa-store"></i> Productos</h2>
            <ul>
                @if(kvfj(Auth::user()->permissions, 'product_add'))
                <li>
                    <a href="{{url('admin/product/add')}}"><i class="fa-solid fa-plus"></i>Agregar Productos
                    </a>
                 </li>
                 @endif
                 <li>
                    <a href="#">Filtrar <i class="fa-solid fa-caret-down"></i></a>
                    <ul class="shadow">
                        <li><a href="{{url('admin/products/1')}}"><i class="fa-solid fa-globe"></i>Públicos</a></li>
                        <li><a href="{{url('admin/products/0')}}"><i class="fa-solid fa-lock"></i> Privados</a></li> 
                        <li><a href="{{url('admin/products/trash')}}"><i class="fa-solid fa-trash-can"></i> Papelera</a></li> 
                        <li><a href="{{url('admin/products/all')}}"><i class="fa-solid fa-list"></i> Todos</a></li>    
                        
                    </ul>
                 </li>
                 <li>
                    <a href="#" id="btn_search">
                        <i class="fa-solid fa-magnifying-glass"></i>Buscar producto
                    </a>
                 </li>
            </ul>

        </div>
        <div class="inside">
            <div class="form_search" id="form_search">
                {!!Form::open(['url'=>'/admin/product/search'])!!}
                <div class="row">
                    <div class="col-md-4">
                        {!!Form::text('search',null,['class'=>'form-control','placeholder'=>'Busqueda por nombre'])!!}
                    </div>
                    <div class="col-md-4">
                        {!!Form::select('filter', ['0'=>'Nombre del producto','1'=>'Código'],0,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-2">
                        {!!Form::select('status', ['0'=>'Privado','1'=>'Público'],0,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-2">
                        {!!Form::submit('Buscar', ['class'=>'btn btn-primary'])!!}
                    </div>
                </div>
                {!!Form::close()!!}
            </div>

            <table class=" table table-responsive-lg table-striped mtop16">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr >
                        <th>{{$p->id}}</th>
                        <td >
                            <a href="{{url('/uploads/'.$p->file_path.'/'.$p->image)}}" data-fancybox data-caption ="Single image">

                                <img src="{{url('/uploads/'.$p->file_path.'/t_'.$p->image)}} " width="80px" alt="imagen destacada del producto x" >
                            </a>
                            <script>
                                $(document).ready(function(){
                                    Fancybox.bind("[data-fancybox]",{
                                        });
                                });
                            </script>
                        </td>
                        <td>{{$p->name}} @if($p->status == 0) <i class="fa-solid fa-lock" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Estado: Privado"></i>  @endif</td>
                        <td>{{ $p->cat ? $p->cat->name : 'No category' }}</td>
                        <td>{{$p->price}}</td>
                        <td>
                           

                            <div class="opts">  
                                 @if(kvfj(Auth::user()->permissions, 'product_edit'))
                                    <a href="{{url('/admin/product/'.$p->id.'/edit')}}" class="edit" title="Editar" data-placement = "top" data-toggle= "tooltip"><i class="fas fa-edit"></i></a>
                                @endif
                                @if(kvfj(Auth::user()->permissions, 'product_delete'))

                                    <a href="{{url('/admin/product/'.$p->id.'/delete')}}" class="delete" title="Eliminar"><i class="fas fa-trash"></i></a>
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

@endsection