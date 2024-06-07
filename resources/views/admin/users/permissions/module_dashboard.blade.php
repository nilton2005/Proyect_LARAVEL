<dib class="col-md-4">
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
        </div>
    </div>
</dib>