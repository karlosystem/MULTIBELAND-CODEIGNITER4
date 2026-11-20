<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('content'); ?>

<!-- ==========================================================================
SECCIÓN 1: HERO BANNER - PINTURA INDUSTRIAL
========================================================================== -->
<section class="servicio-hero-section position-relative overflow-hidden"
    style="background: linear-gradient(to right, rgba(14, 46, 91, 0.85) 0%, rgba(14, 46, 91, 0.5) 60%, rgba(14, 46, 91, 0.2) 100%), 
    url('<?= base_url('frontend/images/servicios/banner_pintura-industrial.png') ?>') no-repeat center center;
    background-size: cover;
    min-height: 550px;
    display: flex;
    align-items: center;">

    <div class="container position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-lg-8 col-md-10">
                <!-- Título Principal -->
                <h1 class="servicio-hero-title fw-bold mb-4 text-white">
                    Pintura Industrial y Recubrimientos <br class="d-none d-md-block">
                    Anticorrosivos para Maquinaria Pesada
                </h1>

                <!-- Subtítulo con borde lateral -->
                <div class="servicio-hero-subtitle-wrapper mb-5">
                    <p class="servicio-hero-subtitle text-white mb-0">
                        Protegemos y restauramos tus activos con sistemas de pintura Heavy Duty —
                        desde el granallado hasta el acabado final — bajo los más altos estándares
                        operativos mineros.
                    </p>
                </div>

                <!-- Botón de Acción -->
                <a href="<?= base_url('contact-us') ?>" class="btn btn-servicio-cotizar">
                    Solicitar Cotización
                    <span class="fa fa-arrow-right ml-2"></span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FRANJA DE MARCAS -->
<?= $this->include('frontend/partials/brand-belt') ?>

<!-- ==========================================================================
SECCIÓN 2: INGENIERÍA DE SUPERFICIES (RESTAURADA)
========================================================================== -->

<section class="ingenieria-section py-5 position-relative overflow-hidden">
    <!-- Fondo Decorativo de Puntos -->
    <div class="ingenieria-dots-bg" aria-hidden="true">
        <img src="<?= base_url('frontend/images/servicios/background_puntos.png') ?>" alt="" class="img-fluid">
    </div>

    <div class="container py-lg-4 position-relative" style="z-index: 2;">
        <div class="row align-items-center g-4 g-lg-5">

            <!-- Columna Izquierda: Título en 5 Líneas Exactas -->
            <div class="col-lg-5 pe-lg-4">
                <h2 class="ingenieria-title">
                    <span class="text-cyan d-block">No solo <br>pintamos,</span>
                    <span class="text-dark-blue d-block">Ejecutamos <br>ingeniería de <br>superficies.</span>
                </h2>
            </div>

            <!-- Columna Derecha: Tarjetas Horizontales con Separación Amplia -->
            <div class="col-lg-7">
                <div class="d-flex flex-column gap-4">

                    <!-- Tarjeta 1 -->
                    <div class="ingenieria-card">
                        <div class="row align-items-center g-3">
                            <div class="col-md-5">
                                <h4 class="ingenieria-card-title mb-0">
                                    Preparación <br class="d-none d-md-block">certificada de <br class="d-none d-md-block">superficie
                                </h4>
                            </div>
                            <div class="col-md-7">
                                <p class="ingenieria-card-text mb-0 text-cyan">
                                    Mediante granallado o limpieza mecánica para máxima adherencia del recubrimiento.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="ingenieria-card">
                        <div class="row align-items-center g-3">
                            <div class="col-md-5">
                                <h4 class="ingenieria-card-title mb-0">
                                    Aplicación con <br class="d-none d-md-block">control de <br class="d-none d-md-block">espesores
                                </h4>
                            </div>
                            <div class="col-md-7">
                                <p class="ingenieria-card-text mb-0 text-cyan">
                                    Sistemas de pintura según especificaciones del fabricante y normas industriales.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="ingenieria-card">
                        <div class="row align-items-center g-3">
                            <div class="col-md-5">
                                <h4 class="ingenieria-card-title mb-0">
                                    Especificaciones <br class="d-none d-md-block">en restauración <br class="d-none d-md-block">estética
                                </h4>
                            </div>
                            <div class="col-md-7">
                                <p class="ingenieria-card-text text-cyan mb-0">
                                    Devolvemos el color, acabado y protección original del equipo.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================================================
SECCIÓN 3: TIPOS DE MAQUINARIA
========================================================================== -->
<section class="maquinaria-section position-relative py-5" style="background-color: #F6FAFD;">
    <!-- Patrón decorativo de puntos -->
    <div class="dot-pattern-maquinaria"></div>

    <div class="container position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h3 class="maquinaria-title fw-bold">
                    ¿Para qué tipo de maquinaria trabajamos?
                </h3>
            </div>
        </div>

        <!-- Ítem 01: Minería -->
        <div class="maquinaria-item-container mb-5">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-lg-7 order-lg-1 order-2">
                    <div class="d-flex align-items-center justify-content-center gap-4 gap-lg-5">
                        <div class="maquinaria-numero-col me-3 me-md-4">
                            <span class="maquinaria-numero">01.</span>
                        </div>
                        <div class="maquinaria-text-col">
                            <h4 class="maquinaria-tipo text-center mb-2">Minería</h4>
                            <p class="maquinaria-descripcion mb-0">
                                Excavadoras, cargadores frontales, volquetes, perforadoras y equipos auxiliares. Sistemas de pintura resistentes a abrasión, polvo y humedad extrema.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-2 order-1 text-center">
                    <div class="maquinaria-icono-wrapper mx-auto">
                        <img src="<?= base_url('frontend/images/servicios/pintura-mineria.png') ?>" alt="Minería" class="img-fluid maquinaria-icono-img">
                    </div>
                </div>
            </div>
        </div>

        <!-- Ítem 02: Construcción -->
        <div class="maquinaria-item-container mb-5">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-lg-5 order-lg-1 order-1 text-center">
                    <div class="maquinaria-icono-wrapper mx-auto">
                        <img src="<?= base_url('frontend/images/servicios/pintura-construccion.png') ?>" alt="Construcción" class="img-fluid maquinaria-icono-img">
                    </div>
                </div>
                <div class="col-lg-7 order-lg-2 order-2">
                    <div class="d-flex align-items-center justify-content-center gap-4 gap-lg-5">
                        <div class="maquinaria-numero-col me-3 me-md-4">
                            <span class="maquinaria-numero">02.</span>
                        </div>
                        <div class="maquinaria-text-col">
                            <h4 class="maquinaria-tipo text-center mb-2">Construcción</h4>
                            <p class="maquinaria-descripcion mb-0">
                                Mototraíllas, grúas, compactadoras, mezcladoras y retroexcavadoras. Recubrimientos anticorrosivos para entornos con humedad y exposición constante.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ítem 03: Agricultura -->
        <div class="maquinaria-item-container mb-5">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-lg-7 order-lg-1 order-2">
                    <div class="d-flex align-items-center justify-content-center gap-4 gap-lg-5">
                        <div class="maquinaria-numero-col me-3 me-md-4">
                            <span class="maquinaria-numero">03.</span>
                        </div>
                        <div class="maquinaria-text-col">
                            <h4 class="maquinaria-tipo text-center mb-2">Agricultura</h4>
                            <p class="maquinaria-descripcion mb-0">
                                Cosechadoras, tractores, implementos agrícolas y equipos de riego. Pintura resistente a agroquímicos, sol y campo abierto.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-2 order-1 text-center">
                    <div class="maquinaria-icono-wrapper mx-auto">
                        <img src="<?= base_url('frontend/images/servicios/pintura-agricultura.png') ?>" alt="Agricultura" class="img-fluid maquinaria-icono-img">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ==========================================================================
SECCIÓN 4: NUESTRO PROCESO
========================================================================== -->
<section class="proceso-section py-2 position-relative overflow-hidden">
    <div class="container ps-0 pe-lg-4">
        <div class="row g-0 align-items-center">

            <!-- Bloque Izquierdo: Banner Cyan -->
            <div class="col-lg-5 col-xl-4">
                <div class="proceso-banner-cyan">
                    <h3 class="proceso-banner-title">
                        Nuestro Proceso:<br>
                        Del Diagnóstico<br>
                        al Acabado Final
                    </h3>
                </div>
            </div>

            <!-- Bloque Derecho: Tarjetas de Proceso -->
            <div class="col-lg-7 col-xl-8 ps-lg-0 pe-3 pe-lg-0 mt-4 mt-lg-0">
                <div class="row g-3 g-xl-4 align-items-stretch">

                    <!-- Tarjeta 1 -->
                    <div class="col-md-4">
                        <div class="proceso-card proceso-card-overlap h-100">
                            <h4 class="proceso-card-title">Diagnóstico y Evaluación</h4>
                            <p class="proceso-card-text">
                                Inspección técnica del equipo: estado de la superficie, tipo de corrosión, condiciones de operación y requerimientos del cliente.
                            </p>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="col-md-4">
                        <div class="proceso-card h-100">
                            <h4 class="proceso-card-title">Enmascarado de Precisión</h4>
                            <p class="proceso-card-text">
                                Protección de componentes eléctricos, hidráulicos y áreas sensibles para garantizar la operatividad del equipo durante el proceso.
                            </p>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="col-md-4">
                        <div class="proceso-card h-100">
                            <h4 class="proceso-card-title">Preparación de Superficie</h4>
                            <p class="proceso-card-text">
                                Granallado o limpieza mecánica para eliminar contaminantes, óxido y pintura antigua. Máxima adherencia garantizada.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================================================
SECCIÓN 5: ¿POR QUÉ CONFIAR EN MULTI BELAND?
========================================================================== -->
<section class="confianza-section py-5 position-relative overflow-hidden">
    <div class="container py-lg-4">
        <div class="row align-items-center g-4 g-lg-5">

            <!-- Columna Izquierda: Título Principal -->
            <div class="col-lg-5 pe-lg-4">
                <h3 class="confianza-title">
                    ¿Por qué confiar en Multi Beland para la pintura de tu flota?
                </h3>
            </div>

            <!-- Columna Derecha: Tarjetas + Flechas de Fondo -->
            <div class="col-lg-7 position-relative">

                <!-- Flechas de Fondo -->
                <div class="confianza-arrows-bg" aria-hidden="true">
                    <img src="<?= base_url('frontend/images/servicios/background_flechas.png') ?>" alt="Flechas de fondo" class="img-fluid">               
                </div>

                <!-- Grid 2x2 con Espaciado Vertical -->
                <div class="row g-4 g-xl-5 position-relative" style="z-index: 2;">

                    <!-- Tarjeta 1 -->
                    <div class="col-sm-6 mb-4">
                        <div class="confianza-card h-100">
                            <h4 class="confianza-card-title">Intervención en taller o en campo</h4>
                            <p class="confianza-card-text">
                                Vamos donde está tu equipo. No necesitas movilizar tu flota a la ciudad.
                            </p>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="col-sm-6 mb-4">
                        <div class="confianza-card h-100">
                            <h4 class="confianza-card-title">Personal técnico certificado</h4>
                            <p class="confianza-card-text">
                                Operarios con experiencia en campo y taller. Cumplimiento de normas de seguridad industrial.
                            </p>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="col-sm-6">
                        <div class="confianza-card h-100">
                            <h4 class="confianza-card-title">Materiales de calidad comprobada</h4>
                            <p class="confianza-card-text">
                                Sistemas de pintura de marcas reconocidas. Control de espesores y condiciones ambientales.
                            </p>
                        </div>
                    </div>

                    <!-- Tarjeta 4 -->
                    <div class="col-sm-6">
                        <div class="confianza-card h-100">
                            <h4 class="confianza-card-title">Trazabilidad del trabajo</h4>
                            <p class="confianza-card-text">
                                Control de calidad continuo, reportes de avance y certificación de acabado final en cada unidad.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('.servicio-hero-title').css({
            opacity: 0,
            transform: 'translateY(20px)'
        }).animate({
            opacity: 1
        }, {
            duration: 800,
            step: function(now) {
                $(this).css('transform', 'translateY(' + (20 - (now * 20)) + 'px)');
            }
        });

        $('.servicio-hero-subtitle-wrapper').css({
            opacity: 0
        }).delay(300).animate({
            opacity: 1
        }, 800);

        $('.btn-servicio-cotizar').css({
            opacity: 0
        }).delay(600).animate({
            opacity: 1
        }, 800);
    });
</script>
<?= $this->endSection(); ?>