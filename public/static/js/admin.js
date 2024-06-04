var base = location.protocol + "//" + location.host;
// Extraer los metas de master en admin
var route = document.getElementsByName('routName')[0].getAttribute('content');


// Document ready event listener
document.addEventListener('DOMContentLoaded', function() {

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
    document.getElementsByClassName('lk-'+route)[0].classList.add('active');
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