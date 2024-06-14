<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"> <i class="fa-solid fa-house-user"></i> Modulo Dashboard </h2>
        </div>
        <div class="inside">
                    {{--Lista de permisos--}}
      
            <div class="form-check">
                <input type="checkbox" value="true" name='dashboard' @if(kvfj($u->permissions, 'dashboard' )): checked @endif>
                <label for="dashboard">Acceso al dashboard</label>

            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='dashboard_small_stats' @if(kvfj($u->permissions, 'dashboard_small_stats' )): checked @endif>
                <label for="dashboard_small_stats">Acceso estadísticas</label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='dashboard_today_sales' @if(kvfj($u->permissions, 'dashboard_today_sales' )): checked @endif>
                <label for="dashboard_today_sales">Acceso ventas del día</label>
            </div>
        </div>

    </div>
</div>