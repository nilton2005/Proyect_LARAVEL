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
                    {{--Envio del fomulario--}}
                {!!Form::open(['url'=>'/admin/product/'.$p->id.'/edit','files'=>true])!!}
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
                    <div class="col-md-3">
                        <label for="indiscount">Estado: </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
                            {{form::select('status',['0'=>'Privado', '1'=>'Público'],$p->status,['class'=>'form-select'])}}
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
                    <h2 class="title"><i class="fa-solid fa-image"></i> Imagen destacada</h2>
                    </div>
                    <div class="inside">
                        <img src="{{url('/uploads/'.$p->file_path.'/'.$p->image)}} " class="img-fluid" alt="imagen destacada del producto x" >
                    </div>
                </div>    
            
            <div class="panel shadow mtop16">
                <div class="header">
                    <h2 class="title"><i class="fa-solid fa-image"></i> Galeria</h2>
                </div>
                    <div class="inside   product_gallery  ">
                        {{Form::open(['url'=> 'admin/product/'.$p->id.'/gallery/add', 'files'=>true, 'id'=>'form_product_gallery'])}}
                        {!!Form::file('file_image',['id'=>'product_file_image','accept'=>'image/*', 'style'=>'display:none;', 'required'])!!}
                        {!!Form::close()!!}
                        {{--Permisos de usuario--}}
                        @if(kvfj(Auth::user()->permissions, 'product_gallery_add'))
                        <div class="btn-submit">
                            <a href="#" id="btn_product_file_image"><i class="fa-solid fa-plus"></i></a>
                        </div>
                        @endif
                        <div class="tumbs">
                            @foreach($p->getGallery as $img)
                            <div class="tumb">
                                @if(kvfj(Auth::user()->permissions, 'product_gallery_delete'))
                                <a href="{{url('/admin/product/'.$p->id.'/gallery/'.$img->id.'/delete')}}" data-togglle = "tooltip" data-placement= 'top' title= 'Eliminar'><i class="fas fa-trash"></i>
                                </a>
                                @endif
                                <img src="{{url('/uploads/'.$img->file_path.'/t_'.$img->file_name)}}" alt=" imagenes del producto">
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>    

        </div>


           
        </div>
    </div>
</div>
@endsection