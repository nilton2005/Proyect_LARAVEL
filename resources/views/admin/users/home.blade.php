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
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Rol</td>
                        <td></td>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user  )
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>
                            <div class="opts">
                                <a href="{{url('/admin/users/'.$user->id.'/edit')}}" class="edit" title="Editar"><i class="fas fa-edit"></i></a>
                                {{--
                                <a href="{{url('/admin/users/'.$user->id.'/delete')}}" class="delete" title="Eliminar"><i class="fas fa-trash"></i></a>
                                --}}
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

