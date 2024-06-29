const base = location.protocol + "//" + location.host;
// Extraer los metas de master en admin
const route = document.getElementsByName('routName')[0].getAttribute('content');
// create new slide
const http = new XMLHttpRequest();
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content');
const currency = document.getElementsByName('currency')[0].getAttribute('content');
var page = 1;
var page_section = "";


document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    var slider = new MKSlider();
    var form_avatar_change = document.getElementById('form_avatar_change');
    var input_file_avatar = document.getElementById('input_file_avatar');
    var btn_avatar_edit = document.getElementById('btn_avatar_edit');
    var avatar_change_overlay = document.getElementById('avatar_change_overlay');
    var products_list = document.getElementById('products_list');
    var load_more_products = document.getElementById('load_more_products');

    if(btn_avatar_edit){
        btn_avatar_edit.addEventListener('click', function(e){
            e.preventDefault();
            input_file_avatar.click();
        });
    }
    
    if(load_more_products){
        load_more_products.addEventListener('click', function(e){
            e.preventDefault();
            load_products(page_section);
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
    page_section = section
    var url = base + '/mk/api/load/products/' +page_section+'?page='+ page;
    console.log(url);
    http.open('GET', url, true);
    http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            page = page +1
            var data = this.responseText;
            data = JSON.parse(data);
            if(data.data.length == 0){
                load_more_products.style.display = "none";
            };
            data.data.forEach(function(product, index){
                console.log(product.name);
                var div = "";
                div += "<div class=\"product\">";
                    div += "<div class=\"image\">";
                            div += "<div class=\"overlay\">";
                                div += "<div class=\"btns\">";
                                    div += "<a href=\""+base+"/uploads/"+product.id+"/"+product.slug+"\" ><i class=\"fa-solid fa-eye\"></i></a>";
                                    div += "<a href=\"#\" ><i class=\"fa-solid fa-cart-plus\"></i></a>";
                                    div += "<a href=\"#\" ><i class=\"fa-regular fa-heart\"></i></a>";
                                div += "</div>";
                            div += "</div>";
                            div+="<img src=\""+base+"/uploads/"+product.file_path+"/t_"+product.image+"\">"
                    div += "</div>";
                    div +=   "<a href=\""+base+"/uploads/"+product.id+"/"+product.slug+"\">";
                        div += "<div class=\"title\">"+product.name+"</div>";
                        div += "<div class=\"price\">"+currency+""+product.price+"</div>";
                        div += "<div class=\"options\"></div>";
                    div += "</a>"
                div += "</div>";
                products_list.insertAdjacentHTML('beforeend', div);
            });
        } else {
            console.error("Error en la conexion");
        }
    }
}
