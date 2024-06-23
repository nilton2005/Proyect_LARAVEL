@extends('admin.master')
@section('title', 'Editar usuario')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/users')}}"> <i class="fas fa-users"></i>Usuario</a>
</li>

@endsection


@section('content')
<div class="container-fluid">
    <div class="page_user">
        <div class="row">
            <dib class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-user"></i> Informacion</h2>

                    </div>
                    <div class="inside">
                        @if(is_null($u->avatar))
                        <img src="{{url('/static/images/default_avatar.png')}}"  class="avatar"  alt="Avatar_imge">
                        @else:
                        <img src="{{url('/uploads_users/'.$u->id.'/'.$u->avatar)}}"  class="avatar"  alt="Avatar_imge">
                        @endif
                        <div class="info">
                            <span  class="Title"   >Nombre</span>
                            <span  class="text"   >{{$u->name}}{{$u->lastname}}</span>
                            <span  class="Title"   >Correo </span>
                            <span  class="text"   >{{$u->email}}</span>
                            <span  class="Title"   >Fecha de registro</span>
                            <span  class="text"   >{{$u->created_at}}</span>
                            <span  class="Title"  >Rol del usuario:</span>
                            <span class="text"> {{ getRoleUserArray(null, $u->role) }} </span>
                            <span class="Title" > Estado del usuario</span> 
                            <span class="text">
                                {{ getUserStatusArray(null,$u->status)}}
                            </span>
                        </div>
                        @if(kvfj(Auth::user()->permissions, 'user_banned'))
                            @if($u->status == "100")
                                <a href="{{url('/admin/user/'.$u->id.'/banned')}}" class="btn btn-success" >Activar usuario</a>
                            @else
                                <a href="{{url('/admin/user/'.$u->id.'/banned')}}" class="btn btn-outline-danger" >Suspender usuario</a>
                            @endif
                        @endif
                    </div>
                </div>
            </dib>
            <dib class="col-md-8">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fa-solid fa-user-pen"></i> Editar Informacion</h2>

                    </div>
                    <div class="inside">
                        @if(kvfj(Auth::user()->permissions, 'user_edit'))
                            {!!Form::open(['url'=>'/admin/user/'.$u->id.'/edit'])!!}                        
                        <div class="row">
                            <div class="col-md-5">

                                <label for="module">Tipo de usuario:</label>
                                <div class="input-group  mtop16">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square"></i></span>
            
                                    {{form::select('user_type',getRoleUserArray('list', null),$u->role,['class'=>'form-select'])}}                    
                                </div>
                            </div>
                        </div>
                             <div class="row mtop16">
                                <div class="col-md-12">
                                    {!!Form::submit('Guardar',['class'=>'btn btn-success'])!!}
                                </div>
                             </div>           
                             {!!Form::close()!!}
                        @endif
                    </div>
                </div>
            </dib>
        
        </div>
    </div>
</div>
@endsection
