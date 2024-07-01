@extends('master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

@section('content')
<div class="mt-3">
    <h2>La empresa</h2>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <p>AutoPartes, una innovadora startup tecnológica con sede en Arequipa, está lista para revolucionar el mercado de autopartes ,Esta propuesta nace como respuesta a las necesidades de los clientes automovilistas, conductores y talleres mecánicos que buscan una buena variedad de productos de marcas de calidad en un solo lugar. Y hoy llega a Perú, de forma acelerada para facilitar, de forma online, el acceso a un mundo de productos para tu auto.</p>
    </div>
    <div class="col-md-6">
        <img src="https://previews.123rf.com/images/vladru/vladru1710/vladru171000022/87976903-coche-y-repuestos-transparentes-y-motor-y-otros-detalles-ilustraci%C3%B3n-3d.jpg" width="550px" alt="">
    </div>
</div>
<div class="mt-3 d-flex justify-content-center">
    <h2>Nuestras Marcas</h2>
</div>
<div class="client-area mt-3">
    <div class="container">
        <section class="logo-area slider">
            <div class="slide">
                <!-- dentro de la propiedad src va la ruta de cada logo  -->
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Kenda_Logo.svg/1280px-Kenda_Logo.svg.png" alt="" />
            </div>
            <div class="slide">
                <img src="https://1000marcas.net/wp-content/uploads/2021/02/JAC-Logo.jpg" alt="" />
            </div>
            <div class="slide">
                <img src="https://autoplanet.pe/wp-content/uploads/2021/04/renault.png" alt="" />
            </div>
            <div class="slide">
                <img src="https://autoplanet.pe/wp-content/uploads/2021/01/mag1.png" alt="" />
            </div>
            <div class="slide">
                <img src="https://autoplanet.pe/wp-content/uploads/2021/01/suzuk-2i.png" alt="" />
            </div>
            <div class="slide">
                <img src="https://autoplanet.pe/wp-content/uploads/2021/03/interestate.png" alt="" />
            </div>
            <div class="slide">
                <img src="https://autoplanet.pe/wp-content/uploads/2021/03/toyo.png" alt="" />
            </div>
            <div class="slide">
                <img src="https://autoplanet.pe/wp-content/uploads/2021/04/mazda-3.png" alt="" />
            </div>
            <div class="slide">
                <img src="https://autoplanet.pe/wp-content/uploads/2021/01/great-wall-2-1.png" alt="" />
            </div>
            <div class="slide">
                <img src="https://autoplanet.pe/wp-content/uploads/2021/01/enerbox-2.png" alt="" />
            </div>
        </section>
    </div>
</div>

@endsection