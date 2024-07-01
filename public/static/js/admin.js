var base = location.protocol + "//" + location.host;
// Extraer los metas de master en admin
var route = document.getElementsByName('routName')[0].getAttribute('content');
const http = new XMLHttpRequest();
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content');


// Document ready event listener
document.addEventListener('DOMContentLoaded', function() {
    // activacion de la barra de busqueda
    var category = document.getElementById('category');

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

    if (route == "product_add") {
        setSubCategoriesToProducts();
        }


    // Comprobar si la ruta actual es la ruta de edición del producto
    if (route == "product_edit") {
        setSubCategoriesToProducts();
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
    if(category){
        category.addEventListener('change', setSubCategoriesToProducts);
    }

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
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#f2f2f2",
        confirmButtonText: "Si, estoy de acuerdo",


      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Listo!",
                icon: "success"

            });
             window.location.href = url;
             
        }
      });
}

function setSubCategoriesToProducts(){
    var parent_id = category.value;
    var subcategory_actual = document.getElementById('subcategory_actual').value;
    select = document.getElementById('subcategory')
    var url = base + '/admin/mk/api/load/subcategories/'+parent_id;
    select.innerHTML = "";
    http.open('GET', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var data = this.responseText;
            data = JSON.parse(data);
            data.forEach(function(element, index){
                if(subcategory_actual == element.id){
                    select.innerHTML +="<option value=\""+element.id+"\" selected>"+element.name+"</option>"

                }else{
                    select.innerHTML +="<option value=\""+element.id+"\">"+element.name+"</option>"
                }
            })
            }
    }
}