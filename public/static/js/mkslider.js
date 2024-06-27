class MKSlider{
    constructor(){
        this.init();
        this.slider_active = 0;
        this.elements = 0;
       
    }
    init(){
        var mk_slider_nav_prew = document.getElementById('mk_slider_nav_prew')
        var mk_slider_nav_next = document.getElementById('mk_slider_nav_next')
        mk_slider_nav_prew ?  mk_slider_nav_prew.addEventListener('click', function(){this.navigation('prew')}.bind(this)):null;
        mk_slider_nav_next ?  mk_slider_nav_next.addEventListener('click', function(){this.navigation('next')}.bind(this)):null;
    }
    show() {
   
        var items = document.getElementsByClassName('mk-slider-item');
        this.elements = items.length;
        for(var i=0;i<items.length;i++){
            var pos = i * 100;
            // direccion 
            items[i].style.left = pos+'%';
            items[i].style.display = "flex";
        }
        console.log('slider activo :'+this.slider_active+'-Total Slides:'+ this.elements)
    }

    navigation(action){
        console.log(action);
    }
}