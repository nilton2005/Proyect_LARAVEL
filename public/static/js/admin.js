var base = location.protocol + "//" + location.host;
// Extraer los metas de master en admin
var route = document.getElementsByName('routName')[0].getAttribute('content');


// Document ready event listener
document.addEventListener('DOMContentLoaded', function() {
    // activacion de la barra de busqueda

    var btn_search = document.getElementById('btn_search');
    var form_search = document.getElementById('form_search');
    if(btn_search){
        btn_search.addEventListener('click', function(e){
            e.preventDefault();
            if(form_search.style.display === 'block'){
                form_search.style.display = 'none';
            }else{
                form_search.style.display = 'block'
            }
        });
    }

    // Comprobar si la ruta actual es la ruta de edición del producto
    if (route == "product_edit") {

        // Obtener los elementos del botón y de entrada para la imagen del producto
        var btn_product_file_imagen = document.getElementById('btn_product_file_image');
        var product_file_image = document.getElementById('product_file_image');

        // Añadir un detector de eventos al botón para abrir el diálogo de entrada de archivos
        btn_product_file_imagen.addEventListener('click', function() {
            product_file_image.click();
        });

        // Añadir un detector de eventos al elemento de entrada para enviar el formulario cuando se selecciona un archivo
        product_file_image.addEventListener('change', function() {
            document.getElementById('form_product_gallery').submit();
        });
    }
    route_active =document.getElementsByClassName('lk-'+route)[0].classList.add('active');
    btn_deleted = document.getElementsByClassName('btn-deleted');
    for(i = 0; i < btn_deleted.length; i++){
        btn_deleted[i].addEventListener('click', delete_object);
    }
    console.log(btn_deleted);
});
$(document).ready(function(){
    editor_init('editor');
})


function editor_init(field) {
    CKEDITOR.replace(field, {
        toolbar: [
            { name: 'clipboard', items: ['cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Inlink', 'Blockquote'] },
            { name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source'] }
        ]
    });
}
// ruta delete
function delete_object(e){
    e.preventDefault();
    var object = this.getAttribute('data-object')
    var action = this.getAttribute('data-action')
    var path = this.getAttribute('data-path')
    var url = base + '/' + path +'/' + object+'/'+action
    var title,text, icon;
    if(action == "delete"){
        title= "¿Estas seguro?";
        text= "Este producto se enviará a la bandeja de papela ";
        icon= "warning";
    }
    else{

        title= "Se restaurará el producto";
        text= "Este producto se enbiara a productos disponibles";
       icon= "info";

    }
    swal({
        title: title,
        text: text,
        icon: icon,
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
             window.location.href = url;
        }
      });
}