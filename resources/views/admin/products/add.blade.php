@extends('admin.master')
@section('title', 'Agregar Producto')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/products/1')}}">
        <i class="fas fa-solid fa-store"></i> Productos</a>
</li>

<li class="breadcrumb-item">
    <a href="{{url('/admin/product/add')}}">
        <i class="fa-solid fa-plus"></i> Agregar Producto</a>
</li>

@endsection


@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fa-solid fa-plus"></i> Agregar Producto</h2>

        </div>
        <div class="inside">
            {!!Form::open(['url'=>'/admin/product/add','files'=>true])!!}
            <div class="row">
                <div class="col-md-12">
                    <label for="name">Nombre del producto:</label>
                    <div class="input-group">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::text('name',null,['class'=>'form-control'])!!}
                    </div>
                </div>
            </div>
            <div class="row mtop16">
                <div class="col-md-6">
                    <label for="name" >Categoría</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!form::select('category',$cats,0,['class'=>'form-select', 'id'=>'category'])!!}         
                        {!!Form::hidden('subcategory_actual', 0,['id'=>'subcategory_actual'])!!}        
                  </div>
                  <div class="col-md-6">
                    <label for="name" >Subcategoria:</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>

                        {!!Form::select('subcategory',[],null,['class'=>'form-select', 'id'=>'subcategory', 'required'])!!}                    
                     </div>
                </div>
                </div>
                
            </div>

            <div class="row mtop16">

                {{--columna para la precio--}}
                <div class="col-md-3">
                    <label for="price"> Precio: </label>

                    <div class="input-group">
                          <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i>
                         </span>

                        {!!Form::number('price', null, ['class'=>'form-control', 'min'=>'0.00', 'step'=>'any'])!!}
                    </div>
                </div>
                {{--columna para la oferta--}}
                <div class="col-md-2">
                    <label for="indiscount">¿ en Oferta? </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
                        {{form::select('indiscount',['0'=>'No', '1'=>'Si'],0,['class'=>'form-select'])}}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="discount">Descuento: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
                        {!!Form::number('discount', 0.00, ['class'=>'form-control', 'min'=>'0.00','step'=>'any'])!!}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="name">Imagen Destada</label>
                    <div class="mb-3">
                        {!!Form::file('img',['class'=>'form-control', 'id'=>'formFile', 'accept'=>'image/*'])!!}
       
                    </div>
                </div>

            </div>
            {{--New spaces for products --}}
            <div class="row mtop16">
                <div class="col-md-3">
                    <label for="inventory">Invetario: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
                        {!!Form::number('inventory', 0, ['class'=>'form-control'])!!}
                    </div>
                </div>
           
                <div class="col-md-3">
                    <label for="code">Código de producto: </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
                            {!!Form::text('code', 0, ['class'=>'form-control'])!!}
                    </div>
                </div>

            </div>

            <div class="row mtop16 ">
                <div class="col-md-12">
                    <label for="content">Descripción:</label>
                    {!!Form::textarea('content',null,['class'=>'form-control mtop16','id'=>'editor'])!!}
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
@endsection