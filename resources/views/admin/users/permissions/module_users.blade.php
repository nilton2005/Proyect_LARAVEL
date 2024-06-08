
<dib class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title "><i class="fa-solid fa-users-line"></i>Modulo Usuarios</a> </h2>
        </div>
        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name='user_list' @if(kvfj($u->permissions, 'user_list')): checked @endif; >
                <label for="user_list">Acceso a lista de usuarios</label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='user_edit' @if(kvfj($u->permissions, 'user_edit')): checked @endif; >
                <label for="user_edit">Acceso a editar usuarios</label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='user_banned' @if(kvfj($u->permissions, 'user_banned')): checked @endif; >
                <label for="user_banned">Acceso a banear usuarios</label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='user_permissions' @if(kvfj($u->permissions, 'user_permissions')): checked @endif; >
                <label for="user_permissions">Acceso a los permisos de usuarios</label>
            </div> 
        </div>
    </div>
</dib>