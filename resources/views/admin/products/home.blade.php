
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

        </div>
        <div class="inside">
            <div class="btns">
                <a href="{{url('admin/product/add')}}" class="btn btn-primary"
        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .90rem;color:#c30010; background-color: #ffcbd1;border-color:#ffcbd1;" ><i class="fa-solid fa-plus"></i>Agregar Productos</a>
            </div>
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Imagen</td>
                        <td>Nombre</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <td>{{$p->id}}</td>
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
                        <td>{{$p->name}}</td>
                        <td>{{ $p->cat ? $p->cat->name : 'No category' }}</td>
                        <td>{{$p->price}}</td>
                        <td>
                            <div class="opts">  
                                <a href="{{url('/admin/product/'.$p->id.'/edit')}}" class="edit" title="Editar" data-placement = "top" data-toggle= "tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{url('/admin/product/'.$p->id.'/delete')}}" class="delete" title="Eliminar"><i class="fas fa-trash"></i></a>
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