@extends('master')
@section('title', 'Inicio')
@section('content')
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
        </div>
    </div>
@endsection