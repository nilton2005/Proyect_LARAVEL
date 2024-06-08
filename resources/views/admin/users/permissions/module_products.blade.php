
<dib class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"> <i class="fa-solid fa-store"></i>Modulo Productos </h2>
        </div>

        {{--Lista de permisos--}}
        <div class="inside">
            <div class="form-check">
                <input type="checkbox" value="true" name='products' @if(kvfj($u->permissions, 'products')): checked @endif; >
                <label for="products">Acceso a los productos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='product_add' @if(kvfj($u->permissions, 'product_add')): checked @endif; >
                <label for="product_add">Acceso añadir productos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='product_edit' @if(kvfj($u->permissions, 'product_edit')): checked @endif; >
                <label for="product_edit">Acceso editar productos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='product_delete' @if(kvfj($u->permissions, 'product_delete')): checked @endif;>
                <label for="product_delete">Acceso eliminar producto</label>
            </div>   
            <div class="form-check">
                <input type="checkbox" value="true" name='product_gallery_add' @if(kvfj($u->permissions, 'product_gallery_add')): checked @endif; >
                <label for="product_gallery_add">Acceso añadir imagenes</label>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name='product_gallery_delete' @if(kvfj($u->permissions, 'product_gallery_delete')): checked @endif; >
                <label for="product_gallery_delete">Acceso eliminar imagenes</label>
            </div>         
        </div>
    </div>
</dib>