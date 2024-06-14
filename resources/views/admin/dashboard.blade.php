@extends('admin.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    @if(kvfj(Auth::user()->permissions, 'dashboard_small_stats'))
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fa-solid fa-chart-column"></i>Estadisticas </h2>
        </div>
        
    </div>
    <div class="row mtop16">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fa-solid fa-users-viewfinder"></i> Usuarios registrados </h2>
                </div>
                <div class="inside">
                    <div class="big_count">{{$users}}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fa-solid fa-boxes-stacked"></i> Total de pruducto</h2>
                </div>
                <div class="inside">
                    <div class="big_count">{{$products}}</div>
                </div>
            </div>
        </div>    
        @if(kvfj(Auth::user()->permissions, 'dashboard_today_sales'))
        <div class="col-md-3 ">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fa-solid fa-basket-shopping"></i> Ordenes hoy</h2>
                </div>
                <div class="inside">
                    <div class="big_count">0</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fa-solid fa-coins"></i> Total facturado hoy</h2>
                </div>
                <div class="inside">
                    <div class="big_count">0</div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif
</div>
@endsection