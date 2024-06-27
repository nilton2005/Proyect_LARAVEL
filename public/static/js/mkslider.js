class MKSlider{
    constructor(){
        this.slider_active = 0;
    }
    show() {
        console.log(this.slider_active);
        var items = document.getElementsByClassName('mk-slider-item');
        for(var i=0;i<items.length;i++){
            var pos = i * 100;
            // direccion 
            items[i].style.left = pos+'%';
            items[i].style.display = "flex";
        }
    }
}