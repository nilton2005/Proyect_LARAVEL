@extends('master')
@section('title', 'Inicio')
@section('content')
<section>
    <div class="home_action_bar">
        <div class="row">
            <div class="col-md-3">
                <div class="categories">
                    <a href="#"><i class="fa-solid fa-bars-staggered"></i>Categorias</a>
                    <ul class="shadow">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{url('/store/category/'.$category->id.'/'.$category->slug)}}">
                            <img src="{{url('/uploads/'.$category->file_path.'/'.$category->icon)}}" alt="icono de la categoria">{{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                {!!Form::open(['url'=>'/search'])!!}
                <div class="input-group">
                    <i class="fa-solid fa-magnifying-glass"></i> 
                    {!!Form::text('search_query',null,['class'=>'form-control','placeholder'=> '¿Que autoparte estas buscando?','required'])!!}
                      <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Buscar</button>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</section>
<section>
    <div class="mkslider">
        <div class="mk-slider-item">
            1
        </div>
        <div class="mk-slider-item">
            2
        </div>
        <div class="mk-slider-item">
            3
        </div>
        <div class="mk-slider-item">
            4
        </div>
        <div class="mk-slider-item">
            5
        </div>
    </div>
</section>
@endsection