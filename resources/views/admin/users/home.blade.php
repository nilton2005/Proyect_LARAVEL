@extends('admin.master')
@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/users')}}"> <i class="fas fa-users"></i>Usuarios</a>
</li>

@endsection


@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-users"></i> Usuarios</h2>

        </div>
        <div class="inside">
            <div class ="row">
                <div class="col-md-2 offset-md-9">
                    <div class="dropdown"> 
                        <tr>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%">
                            <i class="fa-solid fa-filter"></i>   Filtrar
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{url('/admin/users/all')}}">Todos</a></li>
                                <li><a class="dropdown-item" href=""{{url('/admin/users/1')}}>Verificados</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{url('/admin/users/0')}}">No verificados</a></li>
                                <li><a class="dropdown-item" href="{{url('/admin/users/100')}}">Suspendidos</a></li>
                            </ul>
                        </tr>

                    </div>
                </div>
            </div>  

            <table class="table mtop16">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Estado</td>
                        <td>Rol</td>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user  )
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td> {{ getUserStatusArrayKey($user->status)}} </td>
                        <td> {{ getRoleUserArrayKey($user->role) }} </td>

                        <td>
                            <div class="opts">
                                <a href="{{url('/admin/user/'.$user->id.'/edit')}}" class="edit" title="Editar"><i class="fas fa-edit"></i></a>
                                {{--
                                <a href="{{url('/admin/users/'.$user->id.'/delete')}}" class="delete" title="Eliminar"><i class="fas fa-trash"></i></a>
                                --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="7">{!!$users->render()!!}</td>
                    </tr>
                       
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

