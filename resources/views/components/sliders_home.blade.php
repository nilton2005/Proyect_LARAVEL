<div class="mkslider">
    <ul class="navigation">
        <li><a href="#" id="mk_slider_nav_prew" ><i class="fa-solid fa-arrow-left"></i></a></li>
        <li><a href="#" id="mk_slider_nav_next" ><i class="fa-solid fa-arrow-right"></i></a></li>
    </ul>
    @foreach($sliders as $slider)
        <div class="mk-slider-item" style="background-color:antiquewhite">
            <div class="row">
                 <div class="col-md-7 col-12">
                    <div class="content">
                        <div class="cinside">
                            {!!html_entity_decode($slider->content)!!}

                        </div>
                    </div>
                 </div>
                 <div class="col-md-5 col-12">
                    <img src="{{url('uploads/'.$slider->file_path.'/'.$slider->file_name)}} " alt="Imagen del slider">
                 </div>
            </div>
        </div>

    @endforeach

</div>