class MKSlider{
    constructor(){
        this.slider_active = 0
        this.elements = 0;
        this.items = document.getElementsByClassName('mk-slider-item');
        this.elements = this.items.length - 1;
        this.init();
       
    }
    init(){
        var mk_slider_nav_prew = document.getElementById('mk_slider_nav_prew')
        var mk_slider_nav_next = document.getElementById('mk_slider_nav_next')
        // Recoger evento
        mk_slider_nav_prew ?  mk_slider_nav_prew.addEventListener('click', function(){this.navigation('prew')}.bind(this)):null;
        mk_slider_nav_next ?  mk_slider_nav_next.addEventListener('click', function(){this.navigation('next')}.bind(this)):null;
    }
    show() {
        // estilar cada slide
        for(var i=0;i<this.items.length;i++){
            var pos = i * 100;
            // direccion 
            this.items[i].style.left = pos+'%';
            this.items[i].style.display = "flex";
        }
        console.log('slider activo :'+this.slider_active+'-Total Slides:'+ this.elements)
    }
    /*
    // rreorganizar para mostrar 
    active(){
        console.log(this.slider_active);
        for(var i=0;i<this.items.length;i++){
            //var pos = i * 100;
            // direccion 
            console.log('slide #'+i+'pos'+this.items[i].style.left);
        }
    }
*/
    navigation(action){
        // numero de slides activos
        if(action == "prew"){
            if(this.slider_active > 0){
                this.slider_active = this.slider_active -1;
                for(var i=0;i<this.items.length;i++){
                    var pos = parseInt(this.items[i].style.left) + 100;
                    this.items[i].style.left = pos+'%';
                }
            }
        }
        if(action == "next"){
            if(this.slider_active < this.elements){
                this.slider_active = this.slider_active + 1;
                for(var i=0;i<this.items.length;i++){
                    var pos = parseInt(this.items[i].style.left) - 100;
                    this.items[i].style.left = pos+'%';
                }
            }
        }
    }
}