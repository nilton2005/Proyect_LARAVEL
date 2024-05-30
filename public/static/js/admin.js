var base = location.protocol + "//" + location.host;

$(document).ready(function(){
    editor_init('editor');
})
document.addEventListener('DOMContentLoaded', function(){
    var btn_product_file_imagen = document.getElementById('btn_product_file_image');
    var product_file_image = document.getElementById('product_file_image');
    btn_product_file_imagen.addEventListener('click',function(){
        product_file_image.click();
    });

    product_file_image.addEventListener('change',function(){
        document.getElementById('form_product_gallery').submit();
    });

});

function editor_init(field) {
    CKEDITOR.replace(field, {
        toolbar: [
            { name: 'clipboard', items: ['cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Inlink', 'Blockquote'] },
            { name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source'] }
        ]
    });
}