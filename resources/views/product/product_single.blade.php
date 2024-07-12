@extends('master')
@section('title', $product->name)
@section('content')
<div class="product_single shadow-lg">
    <div class="inside">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pleft0">
                    <div class="slick-slider">
                        <div>
                            <a href="{{url('/uploads/'.$product->file_path.'/'.$product->image)}} " data-fancybox data-caption ="Single image" >
                                <img src="{{url('/uploads/'.$product->file_path.'/'.$product->image)}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        @if(count($product->getGallery) > 0)
                            @foreach ($product->getGallery as $gallery)
                            <div>
                                <a href="{{url('/uploads/'.$gallery->file_path.'/t_'.   $gallery->file_name)}}"  data-fancybox data-caption ="Single image"   > 
                                    <img src="{{url('/uploads/'.$gallery->file_path.'/t_'.$gallery->file_name)}}" class="img-fluid">
                                </a>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="title" >{{$product->name}} </h2>
                    <div class="category">
                        <ul>
                            <li><a href="{{url('/')}}"> <i class="fa-solid fa-house"></i></a>Inicio</li>
                            <li><span class="next"><i class="fa-solid fa-arrow-right"></i></span></li>
                            <li><a href="{{url('/store')}}"> <i class="fa-solid fa-shop"></i></a>Tienda</li>
                            <li><span class="next"><i class="fa-solid fa-arrow-right"></i></span></li>
                            
                                <li><a href="{{url('/store')}}"><i class="fa-solid fa-folder-open"></i></a>{{$product->cat->name}}</li>
                            
                            @if($product->subcategory_id != "0")
                                <li><a href="{{url('/store')}}"> <img src="{{url('/uploads/'.$product->cat->file_path.'/'.$product->cat->icon)}}" alt=""></a>{{$product->cat->name}}</li>
                            @endif

                        </ul>
                    </div>
                    <div class="add_cart">
                        {!!Form::open(['url'=> '/cart/add'])!!}
                        <div class="row">
                            <div class="com-md-12">
                                <span class="price">
                                    {{Config::get('marketplace.currency').number_format($product->price,2,'.',',')}}
                                </span>
                            </div>

                        </div>          
                        <h5 class="title mtop24" >Cantidad deseada </h5>
                        <div class="row ">
                                <div class="col-md-4">
                                    <div class="quantity">
                              
                                    <a href="#" class="amount_action"   data-action="minus">
                                        <i class="fa-solid fa-minus"></i>
                                    </a>
                                        {{Form::number('quantity',1,['class'=>'form-control', 'min'=>'1', 'id'=>'add_to_cart_quantity'])}}
                                    <a href="#" class="amount_action" data_action="plus">
                                    <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <button class=" btn btn-success"><i class="fa-solid fa-cart-plus"></i>Agregar al carrito</button>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                    <div class="content">
                        {!! html_entity_decode($product->content) !!}
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</div>

@endsection