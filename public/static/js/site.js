const base = location.protocol + "//" + location.host;
// Extraer los metas de master en admin
const route = document.getElementsByName('routName')[0].getAttribute('content');
// create new slide
const http = new XMLHttpRequest();
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content');
const currency = document.getElementsByName('currency')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function() {
    var slider = new MKSlider();
    var form_avatar_change = document.getElementById('form_avatar_change');
    var input_file_avatar = document.getElementById('input_file_avatar');
    var btn_avatar_edit = document.getElementById('btn_avatar_edit');
    var avatar_change_overlay = document.getElementById('avatar_change_overlay');
    var products_list = document.getElementById('products_list');

    if(btn_avatar_edit){
        btn_avatar_edit.addEventListener('click', function(e){
            e.preventDefault();
            input_file_avatar.click();
        });
    }
    if(input_file_avatar){
        input_file_avatar.addEventListener('change', function(){
            var load_img = '<img src="'+base+'/static/images/loader_red.svg"/>';
            avatar_change_overlay.innerHTML = load_img;
            avatar_change_overlay.style.display = 'flex';
            form_avatar_change.submit();
        });
    }

    slider.show();
    if(route == "home"){
        load_products('home');
    }
});

function load_products(section){
    var url = base + '/mk/api/load/products/' + section;
    console.log(url);
    http.open('GET', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var data = this.responseText;
            data = JSON.parse(data);
            console.log(data.data);
            data.data.forEach(function(product, index){
                console.log(product.name);
                var div = "";
                div += "<div class=\"product\">";
                    div += "<img src=\""+base+"/uploads/"+product.file_path+"/t_"+product.image+"\">";
                    div += "<div class=\"title\">"+product.name+"</div>";
                    div += "<div class=\"price\">"+currency+""+product.price+"</div>";
                    div += "<div class=\"options\"></div>";
                div += "</div>";
                products_list.insertAdjacentHTML('beforeend', div);
            });
        } else {
            console.error("Error en la conexion");
        }
    }
}
