@extends('admin.master')
@section('title', 'Editar Producto')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/products')}}">
        <i class="fas fa-solid fa-store"></i> Productos</a>
</li>



@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
             <div class="panel shadow">
                <div class="header">
                <h2 class="title"><i class="fa-regular fa-pen-to-square"></i> Editar Producto</h2>

                </div>  
                <div class="inside">
                {!!Form::open(['url'=>'/admin/product/add','files'=>true])!!}
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Nombre del producto:</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                            {!!Form::text('name',$p->name,['class'=>'form-control'])!!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="name" >Categoría</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                            {!!form::select('category',$cats,$p->category_ID,['class'=>'form-select'])!!}                    
                    </div>


                    </div>
                    <div class="col-md-4">
                        <label for="name">Imagen Destacada</label>
                        <div class="mb-3">
                            {!!Form::file('img',['class'=>'form-control', 'id'=>'formFile', 'accept'=>'image/*'])!!}
        
                        </div>
                    </div>
                </div>

                <div class="row">

                    {{--columna para la precio--}}
                    <div class="col-md-3">
                        <label for="price"> Precio: </label>

                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i>
                            </span>

                            {!!Form::number('price', 
                        $p ->price, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                        </div>
                    </div>
                    {{--columna para la oferta--}}
                    <div class="col-md-3">
                        <label for="indiscount">¿ en Oferta? </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
                            {{form::select('indiscount',['0'=>'No', '1'=>'Si'],$p->in_discount,['class'=>'form-select'])}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="discount">Descuento: </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
                            {!!Form::number('discount', $p->discount, ['class'=>'form-control', 'min'=>'0.00','step'=>'any'])!!}
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <label for="content">Descripción:</label>
                        {!!Form::textarea('content',$p->content,['class'=>'form-control mtop16','id'=>'editor'])!!}
                    </div>
                </div>
                <div class="row mtop16">
                    <div class="col-md12">
                        {!!Form::submit('Guardar', ['class'=>'btn btn-success mtop16'])!!}
                    </div>
                </div>
                {!!Form::close()!!}         
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fa-solid fa-image"></i> Imagenes</h2>
                    </div>
                    <div class="inside">
                        <img src="{{url('/uploads/'.$p->file_path.'/'.$p->image)}} " class="img-fluid" alt="imagen destacada del producto x" >
                    </div>
                </div>    
            </div>
           
        </div>
    </div>
</div>
@endsection