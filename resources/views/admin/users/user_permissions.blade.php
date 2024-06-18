
@extends('admin.master')
@section('title', 'Permisos de usuario')

@section('breadcrumb')

<li class="breadcrumb-item">
    <a href="{{url('/admin/users')}}"> <i class="fas fa-users"></i>Usuario</a>
</li>
<li class="breadcrumb-item">
    <a href="{{url('/admin/users')}}"><i class="fa-solid fa-unlock-keyhole "></i>Permisos para usuario ID: {{$u->id}}</a>
</li>

@endsection
@section('content')
<div class="container-fluid">
    <div class="page_user">
        <form action="{{url('/admin/user/'.$u->id.'/permissions')}}" method="POST">
            @csrf

            <div class="row">
                {{--Esto sera para el modulo de dashboard que bienes de function mediante json--}}
                @foreach(user_permissions() as $key => $value)
                <div class="col-md-4 flex ">
                    <div class="panel shadow">
                        <div class="header">
                            <h2 class="title">{!!$value['icon']!!}   {!!$value['title']!!}</h2>
                        </div>
                        <div class="inside">
                                    {{--Lista de permisos--}}
                            @foreach($value['permisos'] as $k => $v)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role=switch id="flexSwitchCheckChecked" value="true" name="{{$k}}" @if(kvfj($u->permissions, $k )): checked @endif>
                                <label class = "form-check-label" for="flexSwitchCheckChecked">{{$v}}</label>
                            </div>
                             @endforeach
                        </div>

                    </div>
                 </div>
                @endforeach
            </div>
            <div class="row">
                @include('admin.users.permissions.module_dashboard')
                @include('admin.users.permissions.module_products')
                @include('admin.users.permissions.module_categories')
            </div>
            <div class="row mtop16">
                @include('admin.users.permissions.module_users')
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel shadow">
                        <div class="inside">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>            
    </div>
</div>


@endsection
