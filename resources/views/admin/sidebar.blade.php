<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{url('/static/images/logo.png')}}" class="img-fluid">
        </div>
        <div class="user">
            <span class="subtitle">Bienvenido</span>
            <div class="name">
                {{Auth::user()->name}} {{Auth::user()->lastname}}
                <a href="{{url('/logout')}}" 

                 

                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Salir">
                <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
            <div class="email">{{Auth::user()->email}}</div>
        </div>
    </div>
    <div class="main">
        <ul>
            <li>
                <a href="{{url('/admin')}}" > <i class="fa-solid fa-house-user"></i> Dasboard </a>
            </li>
            
            <li>
                <a href="{{url('/admin/products')}}"> <i class="fa-solid fa-store"></i>Productos</a>
            </li>

            <li>
                <a href="{{url('/admin/categories/0')}}"> <i class="fa-regular fa-folder"></i>  Categorias</a>
            </li>

            <li>
                <a href="{{url('/admin/users')}}"><i class="fa-solid fa-users-line"></i>Usuarios</a>
            </li>
        </ul>
    </div>
</div>