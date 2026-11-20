<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('content'); ?>

<!-- ========================================================================
SECCIÓN 1: HERO BANNER - SOLDADURA INDUSTRIAL
========================================================================== -->
<section class="hero-soldadura-industrial"
    style="background: linear-gradient(90deg, rgba(14, 46, 91, 0.75) 0%, rgba(14, 46, 91, 0.55) 40%, rgba(14, 46, 91, 0.25) 70%, rgba(14, 46, 91, 0.1) 100%), url('<?= base_url('frontend/images/servicios/banner-soldadura.png') ?>') center center / cover no-repeat;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="hero-title-soldadura text-white mb-4">
                    Soldadura Industrial y Reconstrucción de<br>
                    <span class="text-highlight">Componentes de Alto Desgaste</span>
                </h1>
                <p class="hero-subtitle text-white mb-5">
                    Reconstruimos estructuras de maquinaria pesada con soldadura de alta resistencia, garantizando máxima durabilidad en minería y construcción severa.
                </p>
                <a href="<?= base_url('contact-us') ?>" class="btn btn-cotizar-soldadura px-5 py-3 text-white font-weight-bold">
                    <i class="fa fa-phone mr-2"></i> Cotizar Servicio
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FRANJA DE MARCAS -->
<?= $this->include('frontend/partials/brand-belt') ?>

<!-- ========================================================================
SECCIÓN 2: PILARES DEL SERVICIO
========================================================================== -->
<section class="pilares-servicio-section py-5 position-relative overflow-hidden">
    <div class="container py-md-4 position-relative">
        <div class="row align-items-center">
            <!-- Columna Izquierda: Título -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <h2 class="pilares-title">
                    Pilares del<br>
                    <span class="text-cyan">servicio</span>
                </h2>
                <div class="pilares-line"></div>
            </div>

            <!-- Columna Derecha: Imagen de las 4 cápsulas apiladas -->
            <div class="col-lg-7 text-center">
                <img src="<?= base_url('frontend/images/servicios/pilares-soldadura.png') ?>"
                    alt="Pilares del servicio de soldadura industrial"
                    class="img-fluid pilares-image">
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================
SECCIÓN 3: CARRUSEL DE IMÁGENES - SOLDADURA INDUSTRIAL
========================================================================== -->
<section class="carousel-soldadura-section py-5 position-relative overflow-hidden">
    <!-- Fondo decorativo con patrón de puntos -->
    <div class="carousel-bg-dots"></div>

    <div class="container py-md-4 position-relative">

        <!-- Carrusel Owl Carousel - 1 imagen por slide -->
        <div class="owl-carousel owl-theme carousel-soldadura-wrapper" id="carouselSoldadura">
            <!-- Slide 1 -->
            <div class="item">
                <div class="carousel-slide-card">
                    <img src="<?= base_url('frontend/images/servicios/soldadura/banner01.jpg') ?>"
                        alt="Operario soldando con máscara de protección"
                        class="img-fluid w-100">
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="item">
                <div class="carousel-slide-card">
                    <img src="<?= base_url('frontend/images/servicios/soldadura/banner02.jpg') ?>"
                        alt="Chispas de soldadura industrial"
                        class="img-fluid w-100">
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="item">
                <div class="carousel-slide-card">
                    <img src="<?= base_url('frontend/images/servicios/soldadura/banner03.jpg') ?>"
                        alt="Soldadura TIG de precisión"
                        class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================================
SECCIÓN 4: SECTORES ATENDIDOS
========================================================================== -->
<section class="sectores-atendidos-section py-5 position-relative overflow-hidden">
    <!-- Fondo decorativo con patrón de puntos -->
    <div class="sectores-bg-dots"></div>

    <!-- Imagen de fondo decorativa (flechas) -->
    <img src="<?= base_url('frontend/images/servicios/background_flechas.png') ?>"
        alt=""
        class="sectores-bg-arrows"
        aria-hidden="true">

    <div class="container py-md-4 position-relative">
        <div class="row align-items-center">
            <!-- Columna Izquierda: Título -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h2 class="sectores-title">
                    Sectores<br>
                    <span class="text-cyan">atendidos</span>
                </h2>
            </div>

            <!-- Columna Derecha: Tarjetas de Sectores -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Sector Minería -->
                    <div class="col-md-6 mb-4">
                        <div class="sector-card">
                            <div class="sector-card-body p-4 p-md-5">
                                <h4 class="sector-card-title">Sector Minería</h4>
                                <p class="sector-card-text">
                                    Reconstrucción de cucharones, brazos y estructuras sometidas a fatiga y desgaste extremo.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Sector Construcción -->
                    <div class="col-md-6 mb-4">
                        <div class="sector-card">
                            <div class="sector-card-body p-4 p-md-5">
                                <h4 class="sector-card-title">Sector Construcción</h4>
                                <p class="sector-card-text">
                                    Refuerzo estructural de equipos sometidos a cargas pesadas y condiciones de obra severas.
                                </p>
                            </div>
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
        // Inicializar carrusel de soldadura - 1 imagen por slide
        $('#carouselSoldadura').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 800,
            autoplayHoverPause: true,
            navText: [
                "<span class='fa fa-chevron-left'></span>",
                "<span class='fa fa-chevron-right'></span>"
            ],
            responsive: {
                0: {
                    items: 1 // 1 imagen en móviles
                },
                768: {
                    items: 1 // 1 imagen en tablets
                },
                1024: {
                    items: 1 // 1 imagen en desktop
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
<?= $this->endSection(); ?>