<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('content'); ?>

<section class="hero-restauracion">
    <!-- Imagen de fondo llamada directamente desde la vista -->
    <img src="<?= base_url('frontend/images/servicios/restauracion/banner_restauracion.png') ?>"
        alt="Restauración de Cabinas"
        class="hero-background-image">

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="hero-title">
                    Restauración y Reconstrucción de<br>Cabinas de Maquinaria Pesada
                </h1>

                <p class="hero-description">
                    Recuperación especializada de cabinas para maquinaria pesada, orientada a fortalecer la seguridad del operador y la continuidad operativa de cada equipo.
                </p>

                <a href="<?= base_url('contact-us') ?>" class="btn btn-hero-cta">
                    Solicitar Cotización
                </a>
            </div>
        </div>
    </div>

    <!-- Indicadores de carrusel (decorativos) -->
    <div class="carousel-dots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</section>

<!-- FRANJA DE MARCAS -->
<?= $this->include('frontend/partials/brand-belt') ?>

<section class="proceso-renovacion-section">
    <div class="container">

        <!-- Encabezado de la Sección -->
        <div class="text-center mb-5">
            <h2 class="proceso-main-title">Proceso de Renovación Integral</h2>
            <p class="proceso-main-subtitle">
                Desde el diagnóstico hasta la certificación final, aseguramos una recuperación integral de la cabina.
            </p>
        </div>

        <!-- Contenedor Zigzag Centrado -->
        <div class="proceso-zigzag-container">

            <!-- Paso 01 (Impar: Desplazado a la derecha) -->
            <div class="proceso-row step-odd">
                <div class="proceso-graphic">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/paso-01.png') ?>" alt="Paso 01">
                </div>
                <div class="proceso-content">
                    <h3 class="proceso-step-title">Evaluación Técnica y Diagnóstico</h3>
                    <p class="proceso-step-desc">Inspeccionamos la cabina en taller o campo para identificar daños estructurales, desgaste y riesgos operativos antes de intervenir.</p>
                </div>
            </div>

            <!-- Paso 02 (Par: Desplazado a la izquierda para equilibrar) -->
            <div class="proceso-row step-even">
                <div class="proceso-graphic">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/paso-02.png') ?>" alt="Paso 02">
                </div>
                <div class="proceso-content">
                    <h3 class="proceso-step-title">Reconstrucción Estructural FOPS/ROPS</h3>
                    <p class="proceso-step-desc">Recuperamos zonas críticas mediante soldadura especializada, devolviendo la resistencia y seguridad original de la estructura.</p>
                </div>
            </div>

            <!-- Paso 03 (Impar: Desplazado a la derecha) -->
            <div class="proceso-row step-odd">
                <div class="proceso-graphic">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/paso-03.png') ?>" alt="Paso 03">
                </div>
                <div class="proceso-content">
                    <h3 class="proceso-step-title">Tratamiento de Superficies y Pintura Heavy Duty</h3>
                    <p class="proceso-step-desc">Eliminamos corrosión y aplicamos recubrimientos industriales de alta resistencia bajo estándares del fabricante.</p>
                </div>
            </div>

            <!-- Paso 04 (Par: Desplazado a la izquierda para equilibrar) -->
            <div class="proceso-row step-even">
                <div class="proceso-graphic">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/paso-04.png') ?>" alt="Paso 04">
                </div>
                <div class="proceso-content">
                    <h3 class="proceso-step-title">Instalación de Componentes y Hermetizado</h3>
                    <p class="proceso-step-desc">Renovamos vidrios, empaquetaduras y aislantes para proteger la cabina contra polvo, ruido y contaminantes.</p>
                </div>
            </div>

            <!-- Paso 05 (Impar: Desplazado a la derecha) -->
            <div class="proceso-row step-odd">
                <div class="proceso-graphic">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/paso-05.png') ?>" alt="Paso 05">
                </div>
                <div class="proceso-content">
                    <h3 class="proceso-step-title">Control de Calidad y Certificación</h3>
                    <p class="proceso-step-desc">Realizamos pruebas finales de calidad y emitimos la documentación técnica que respalda cada intervención.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="galeria-restauracion-section">
    <div class="container">


        <!-- Contenedor Owl Carousel -->
        <div class="owl-carousel owl-theme galeria-owl-carousel">

            <!-- Item 01 -->
            <div class="item">
                <div class="galeria-card">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/cabina_01.png') ?>" alt="Cabina 01">
                </div>
            </div>

            <!-- Item 02 -->
            <div class="item">
                <div class="galeria-card">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/cabina_02.png') ?>" alt="Cabina 02">
                </div>
            </div>

            <!-- Item 03 -->
            <div class="item">
                <div class="galeria-card">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/cabina_03.png') ?>" alt="Cabina 03">
                </div>
            </div>

            <!-- Item 04 -->
            <div class="item">
                <div class="galeria-card">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/cabina_04.png') ?>" alt="Cabina 04">
                </div>
            </div>

            <!-- Item 05 (Nota: formato PNG) -->
            <div class="item">
                <div class="galeria-card">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/cabina_05.png') ?>" alt="Cabina 05">
                </div>
            </div>

            <!-- Item 06 -->
            <div class="item">
                <div class="galeria-card">
                    <img src="<?= base_url('frontend/images/servicios/restauracion/cabina_06.png') ?>" alt="Cabina 06">
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
        $('.galeria-owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1 // 1 elemento en móviles
                },
                576: {
                    items: 2 // 2 elementos en tablets pequeñas
                },
                768: {
                    items: 3 // 3 elementos en tablets
                },
                1024: {
                    items: 3 // 3 elementos en escritorio
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