<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('content'); ?>

<section class="hero-vidrieria">
    <!-- Imagen de fondo llamada directamente desde la vista -->
    <img src="<?= base_url('frontend/images/servicios/banner-vidrieria.png') ?>"
        alt="Vidriería Industrial"
        class="hero-background-image">

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="hero-title">
                    Vidriería Industrial y Estandarización
                </h1>

                <p class="hero-description">
                    Las cabinas industriales operan en entornos críticos donde el polvo y la radiación extrema comprometen la visibilidad del operador, dañan los componentes internos y ponen en riesgo la seguridad ante impactos.
                </p>

                <a href="<?= base_url('contact-us') ?>" class="btn btn-hero-cta">
                    Solicitar Cotización
                </a>
            </div>
        </div>
    </div>
</section>
<!-- FRANJA DE MARCAS -->
<?= $this->include('frontend/partials/brand-belt') ?>


<section class="vidrieria-pilares-section">
    <img src="<?= base_url('frontend/images/servicios/pilares-bg-arrows.png') ?>"
        alt="Fondo decorativo"
        class="vidrieria-pilares-bg-arrows">

    <div class="container">
        <div class="row align-items-center">

            <!-- Columna Izquierda: Título y Línea Decorativa -->
            <div class="col-lg-5 col-md-12 mb-4 mb-lg-0">
                <h2 class="vidrieria-pilares-title-left">
                    Pilares del<br><span>servicio</span>
                </h2>
                <div class="vidrieria-pilares-decoration-line"></div>
                <p class="vidrieria-pilares-subtitle mt-3">
                    Estándares de calidad y precisión diseñados para maximizar la durabilidad y seguridad en maquinaria pesada.
                </p>
            </div>

            <!-- Columna Derecha: Acordeón -->
            <div class="col-lg-7 col-md-12">
                <div class="vidrieria-pilares-accordion">

                    <!-- Card 1: Cyan -->
                    <div class="vidrieria-pilar-card vidrieria-pilar-cyan" data-index="1">
                        <div class="vidrieria-pilar-header">
                            <h3 class="vidrieria-pilar-card-title">Hermetización y Montaje</h3>
                            <div class="vidrieria-pilar-icon-toggle">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="vidrieria-pilar-body">
                            <p class="vidrieria-pilar-text">
                                Especialistas en instalación de parabrisas y cristales para maquinaria pesada. Aseguramos un sellado industrial que bloquea por completo el ingreso de polvo y ruido exterior.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2: Azul Medio -->
                    <div class="vidrieria-pilar-card vidrieria-pilar-blue" data-index="2">
                        <div class="vidrieria-pilar-header">
                            <h3 class="vidrieria-pilar-card-title">Laminado y Control Térmico</h3>
                            <div class="vidrieria-pilar-icon-toggle">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="vidrieria-pilar-body">
                            <p class="vidrieria-pilar-text">
                                Aplicamos películas de control solar y laminados de seguridad que reducen la radiación UV, mejoran la visibilidad y protegen al operador de impactos externos.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3: Azul Navy -->
                    <div class="vidrieria-pilar-card vidrieria-pilar-navy" data-index="3">
                        <div class="vidrieria-pilar-header">
                            <h3 class="vidrieria-pilar-card-title">Precisión y Menor Downtime</h3>
                            <div class="vidrieria-pilar-icon-toggle">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="vidrieria-pilar-body">
                            <p class="vidrieria-pilar-text">
                                Evaluamos la estructura de la cabina, corregimos desviaciones e instalamos con adhesivos de curado rápido para minimizar la parada del equipo.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="vidrieria-slider-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">

                <!-- Contenedor del Owl Carousel -->
                <div class="owl-carousel owl-theme vidrieria-carousel">

                    <!-- Slide 1 -->
                    <div class="item">
                        <div class="vidrieria-slide-card">
                            <img src="<?= base_url('frontend/images/servicios/vidrieria/slider01.png') ?>"
                                alt="Trabajo de vidriería en maquinaria pesada 1"
                                class="img-fluid">
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="item">
                        <div class="vidrieria-slide-card">
                            <img src="<?= base_url('frontend/images/servicios/vidrieria/slider02.png') ?>"
                                alt="Trabajo de vidriería en maquinaria pesada 2"
                                class="img-fluid">
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="item">
                        <div class="vidrieria-slide-card">
                            <img src="<?= base_url('frontend/images/servicios/vidrieria/slider03.png') ?>"
                                alt="Trabajo de vidriería en maquinaria pesada 3"
                                class="img-fluid">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<section class="estandarizacion-section">
    <div class="container px-lg-5">
        <div class="row align-items-center g-4">

            <!-- Columna Izquierda: Bloque Cyan con Título y Descripción -->
            <div class="col-lg-4 col-md-12 ps-lg-0">
                <div class="estandarizacion-left-box">
                    <h2 class="estandarizacion-title">
                        Estandarización<br><span>Operativa</span>
                    </h2>
                    <p class="estandarizacion-desc">
                        Aseguramos el acceso sin retrasos ni observaciones de tus camionetas, escoltas y maquinaria pesada mediante la implementación exacta de kits de seguridad, señalización y elementos normados.
                    </p>
                </div>
            </div>

            <!-- Columna Derecha: Tarjetas Verticales (Carrusel o Grid adaptable) -->
            <div class="col-lg-8 col-md-12 pe-lg-0">
                <div class="estandarizacion-cards-wrapper">

                    <!-- Card 1: Acceso Sin Demoras -->
                    <div class="estandarizacion-card">
                        <h3 class="estandarizacion-card-title">Acceso Sin Demoras:</h3>
                        <p class="estandarizacion-card-text">
                            Aseguramos el ingreso inmediato de tus unidades a mina implementando kits de seguridad, señalización y componentes bajo la normativa exacta de cada proyecto.
                        </p>
                    </div>

                    <!-- Card 2: Cero Observaciones -->
                    <div class="estandarizacion-card">
                        <h3 class="estandarizacion-card-title">Cero Observaciones:</h3>
                        <p class="estandarizacion-card-text">
                            Garantizamos la correcta ubicación, anclaje y rotulado de todo el equipo de seguridad, eliminando tiempos muertos en auditorías.
                        </p>
                    </div>

                    <!-- Card 3: Fijación Extrema -->
                    <div class="estandarizacion-card">
                        <h3 class="estandarizacion-card-title">Fijación Extrema:</h3>
                        <p class="estandarizacion-card-text">
                            Fabricamos soportes estructurales y bases metálicas reforzadas que soportan las vibraciones y el trabajo pesado en las rutas.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="sectores-atendidos-section">
    <div class="container px-lg-5">
        <div class="row align-items-center g-4">

            <!-- Columna Izquierda: Carrusel de Imágenes de Sectores -->
            <div class="col-lg-6 col-md-12">
                <div class="sectores-slider-wrapper">
                    <div class="owl-carousel owl-theme sectores-carousel">

                        <!-- Slide 1 -->
                        <div class="item">
                            <div class="sectores-slide-card">
                                <img src="<?= base_url('frontend/images/servicios/vidrieria/E1.png') ?>"
                                    alt="Sector Minería - Equipos Pesados 1"
                                    class="img-fluid">
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="item">
                            <div class="sectores-slide-card">
                                <img src="<?= base_url('frontend/images/servicios/vidrieria/E2.png') ?>"
                                    alt="Sector Minería - Equipos Pesados 2"
                                    class="img-fluid">
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="item">
                            <div class="sectores-slide-card">
                                <img src="<?= base_url('frontend/images/servicios/vidrieria/E3.png') ?>"
                                    alt="Sector Minería - Equipos Pesados 3"
                                    class="img-fluid">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Título y Tarjetas Informativas -->
            <div class="col-lg-6 col-md-12">
                <div class="sectores-content-wrapper">

                    <h2 class="sectores-main-title">Sectores atendidos</h2>

                    <div class="sectores-cards-grid">

                        <!-- Tarjeta 1: Sector Minería -->
                        <div class="sector-card">
                            <h3 class="sector-card-title">Sector Minería</h3>
                            <p class="sector-card-text">
                                Reemplazo y sellado de parabrisas en excavadoras, cargadores y volquetes expuestos a proyección de rocas y polvo de sílice.
                            </p>
                        </div>

                        <!-- Tarjeta 2: Sector Construcción -->
                        <div class="sector-card">
                            <h3 class="sector-card-title">Sector Construcción</h3>
                            <p class="sector-card-text">
                                Protección de cabinas en equipos de obra expuestos a impactos, polvo y vibración constante.
                            </p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->include('frontend/partials/clientes-carousel') ?>

<?= $this->include('frontend/partials/serviciosadicionales-carousel') ?>


<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        // Mantener cerradas todas al cargar
        $('.vidrieria-pilar-body').hide();

        // Comportamiento de acordeón con las nuevas clases
        $('.vidrieria-pilar-card .vidrieria-pilar-header').on('click', function() {
            var $currentCard = $(this).closest('.vidrieria-pilar-card');
            var $currentBody = $currentCard.find('.vidrieria-pilar-body');

            if ($currentCard.hasClass('active')) {
                $currentCard.removeClass('active');
                $currentBody.slideUp(250);
            } else {
                $('.vidrieria-pilar-card').removeClass('active');
                $('.vidrieria-pilar-body').slideUp(250);

                $currentCard.addClass('active');
                $currentBody.slideDown(300);
            }
        });
    });
</script>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.vidrieria-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4500,
            autoplayHoverPause: true,
            smartSpeed: 800,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('.owl-servicios-adicionales').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 800,
            autoplayHoverPause: true,
            nav: true,
            dots: false,
            navText: ["<span class='fa fa-chevron-left'></span>", "<span class='fa fa-chevron-right'></span>"],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        });
    });
</script>

<script>
$(document).ready(function(){
    $('.sectores-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 800,
        navText: [
            '<i class="fas fa-chevron-left"></i>', 
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive:{
            0:{ items: 1 },
            768:{ items: 1 },
            1000:{ items: 1 }
        }
    });
});
</script>

<?= $this->endSection(); ?>

