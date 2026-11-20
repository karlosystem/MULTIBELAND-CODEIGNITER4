<?= $this->extend('frontend/layout/pages-layout'); ?>
<?= $this->section('page_meta'); ?>
<meta name="robots" content="index, follow">
<meta name="title" content="Cobertura - Multi Beland S.A.C.">
<meta name="description" content="Cobertura de servicios en todo el Perú. Atendemos en Lima, Arequipa, Cusco, Ica, Ayacucho, Apurímac, Puno, Moquegua y Tacna.">
<meta name="keywords" content="cobertura Perú, servicios maquinaria pesada, Lima, Arequipa, Cusco, Multi Beland">
<link rel="canonical" href="<?= base_url('cobertura') ?>">
<!-- Cargamos cobertura.css de forma específica para esta vista -->
<link rel="stylesheet" href="<?= base_url('frontend/css/cobertura.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- ==========================================================================
     1. HERO BANNER: COBERTURA NACIONAL (Ubicado exactamente debajo del Header)
     ========================================================================== -->
<section class="cobertura-hero position-relative d-flex align-items-center">
    <div class="container position-relative z-index-top">
        <div class="row">
            <!-- El texto se alinea a la izquierda en el espacio azul oscuro del banner -->
            <div class="col-xl-7 col-lg-8 col-md-10 text-start">
                <h1 class="cobertura-main-title">Cobertura Nacional</h1>
                <p class="cobertura-subtitle">
                    Presencia estratégica, soporte técnico y servicios especializados <br class="d-none d-md-block">
                    para maquinaria pesada en los sectores minero e industrial del Perú.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. CONTENIDO PRINCIPAL: MAPA INTERACTIVO Y TARJETAS
     ========================================================================== -->
<section class="cobertura-main-content position-relative pb-5">
    <div class="container">

        <!-- Selector de Sedes (Botones flotantes superpuestos levemente al banner) -->
        <div class="row justify-content-center mb-5">
            <div class="col-12">
                <div class="sede-buttons-container d-flex flex-column flex-md-row gap-4 justify-content-center align-items-center">

                    <!-- Botón Lima (Estilo Cyan) -->
                    <button type="button" class="btn-sede-card active" data-sede="lima">
                        <span class="btn-title">Sede Administrativa y Logística</span>
                        <span class="btn-subtitle">(Lima)</span>
                    </button>

                    <!-- Botón Arequipa (Estilo Azul Oscuro) -->
                    <button type="button" class="btn-sede-card" data-sede="arequipa">
                        <span class="btn-title">Base Técnica y Operativa</span>
                        <span class="btn-subtitle">(Arequipa)</span>
                    </button>

                </div>
            </div>
        </div>

        <!-- Mapa interactivo -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 position-relative d-flex justify-content-center align-items-center">
                <div class="map-interactive-container position-relative">
                    <img src="<?= base_url('frontend/images/cobertura/mapa_cobertura_lima.png') ?>"
                        alt="Mapa de Cobertura MultiBeland"
                        class="img-fluid map-image"
                        id="mapaCobertura">

                    <!-- Tooltip LIMA (Activo por defecto) -->
                    <div class="map-tooltip tooltip-lima show" id="tooltipLima">
                        <div class="tooltip-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>
                        </div>
                        <div class="tooltip-content">
                            <span class="tooltip-title">LIMA</span>
                            <span class="tooltip-desc">Centro administrativo y logístico</span>
                        </div>
                    </div>

                    <!-- Tooltip AREQUIPA -->
                    <div class="map-tooltip tooltip-arequipa" id="tooltipArequipa">
                        <div class="tooltip-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>
                        </div>
                        <div class="tooltip-content">
                            <span class="tooltip-title">AREQUIPA</span>
                            <span class="tooltip-desc">Centro logístico operativo sur</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==========================================
             GRUPO DE TARJETAS: LIMA (Activo por defecto)
             ========================================== -->
        <div class="row g-4 row-cols-1 row-cols-md-3 mt-4 sede-cards-group" id="cards-lima">
            <!-- Tarjeta 1: Fuerza Comercial -->
            <div class="col">
                <div class="cobertura-card h-100 d-flex flex-column">
                    <div class="cobertura-card-header d-flex align-items-start justify-content-between gap-3 mb-2">
                        <h4 class="cobertura-card-title">Fuerza Comercial Especializada</h4>
                        <img src="<?= base_url('frontend/images/cobertura/fuerza_comercial.png') ?>"
                            alt="Icono Fuerza Comercial"
                            class="cobertura-card-icon"
                            loading="lazy">
                    </div>
                    <div class="cobertura-card-body p-0">
                        <p class="cobertura-card-text">
                            Atención directa, asesoría técnica en repuestos e insumos, y cotizaciones ágiles desde Lima para todo el sector industrial.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2: Logística Integrada -->
            <div class="col">
                <div class="cobertura-card h-100 d-flex flex-column">
                    <div class="cobertura-card-header d-flex align-items-start justify-content-between gap-3 mb-2">
                        <h4 class="cobertura-card-title">Logística Integrada al Sur</h4>
                        <img src="<?= base_url('frontend/images/cobertura/logistica.png') ?>"
                            alt="Icono Logística Integrada"
                            class="cobertura-card-icon"
                            loading="lazy">
                    </div>
                    <div class="cobertura-card-body p-0">
                        <p class="cobertura-card-text">
                            Almacenamiento estratégico y despacho sostenido de repuestos y consumibles críticos hacia nuestra sede operativa y unidades mineras.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3: Abastecimiento Suministro -->
            <div class="col">
                <div class="cobertura-card h-100 d-flex flex-column">
                    <div class="cobertura-card-header d-flex align-items-start justify-content-between gap-3 mb-2">
                        <h4 class="cobertura-card-title">Abastecimiento Suministro</h4>
                        <img src="<?= base_url('frontend/images/cobertura/abastecimiento.png') ?>"
                            alt="Icono Abastecimiento"
                            class="cobertura-card-icon"
                            loading="lazy">
                    </div>
                    <div class="cobertura-card-body p-0">
                        <p class="cobertura-card-text">
                            Suministro oportuno de repuestos, componentes mecánicos y consumibles para minería, industria y maquinaria pesada.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==========================================
             GRUPO DE TARJETAS: AREQUIPA (Oculto por defecto)
             ========================================== -->
        <div class="row g-4 row-cols-1 row-cols-md-3 mt-4 sede-cards-group d-none" id="cards-arequipa">
            <!-- Tarjeta 1: Cobertura Macrorregional -->
            <div class="col">
                <div class="cobertura-card h-100 d-flex flex-column">
                    <div class="cobertura-card-header d-flex align-items-start justify-content-between gap-3 mb-2">
                        <h4 class="cobertura-card-title">Cobertura Macrorregional</h4>
                        <img src="<?= base_url('frontend/images/cobertura/cobertura_macrorregional.png') ?>"
                            alt="Icono Cobertura Macrorregional"
                            class="cobertura-card-icon"
                            loading="lazy">
                    </div>
                    <div class="cobertura-card-body p-0">
                        <p class="cobertura-card-text">
                            Respuesta rápida con operaciones continuas y soporte técnico en Arequipa, Cusco, Apurímac, Puno, Moquegua, Tacna, Ica y Ayacucho.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2: Infraestructura Taller Central -->
            <div class="col">
                <div class="cobertura-card h-100 d-flex flex-column">
                    <div class="cobertura-card-header d-flex align-items-start justify-content-between gap-3 mb-2">
                        <h4 class="cobertura-card-title">Infraestructura Taller Central</h4>
                        <img src="<?= base_url('frontend/images/cobertura/infraestructura.png') ?>"
                            alt="Icono Infraestructura Taller Central"
                            class="cobertura-card-icon"
                            loading="lazy">
                    </div>
                    <div class="cobertura-card-body p-0">
                        <p class="cobertura-card-text">
                            Taller especializado en Arequipa equipado para reconstrucción estructural de cabinas, soldadura compleja y metalmecánica pesada.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3: Servicio Flexible -->
            <div class="col">
                <div class="cobertura-card h-100 d-flex flex-column">
                    <div class="cobertura-card-header d-flex align-items-start justify-content-between gap-3 mb-2">
                        <h4 class="cobertura-card-title">Servicio Flexible Taller/Campo</h4>
                        <img src="<?= base_url('frontend/images/cobertura/servicio_flexible.png') ?>"
                            alt="Icono Servicio Flexible"
                            class="cobertura-card-icon"
                            loading="lazy">
                    </div>
                    <div class="cobertura-card-body p-0">
                        <p class="cobertura-card-text">
                            Reparaciones de maquinaria pesada en taller o campo, mediante cuadrillas técnicas según los requerimientos operativos.
                        </p>
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
        // 1. Carrusel de Servicios Adicionales
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
                0: { items: 1 },
                576: { items: 2 },
                768: { items: 3 },
                992: { items: 4 }
            }
        });

        // 2. EFECTO ANIMADO DE INTERCAMBIO DE MAPAS Y TARJETAS INFERIORES
        $('.btn-sede-card').on('click', function() {
            if ($(this).hasClass('active')) return;

            // Alternar estado visual de los botones
            $('.btn-sede-card').removeClass('active');
            $(this).addClass('active');

            var sede = $(this).data('sede');
            var rutaMapaNuevo = "<?= base_url('frontend/images/cobertura/mapa_cobertura_') ?>" + sede + ".png";

            // Activar animación de salida (Desvanecimiento y escala) para mapa y tooltips
            $('#mapaCobertura').addClass('map-transitioning');
            $('.map-tooltip').removeClass('show'); 
            
            // Añadir desvanecimiento sutil a las tarjetas salientes
            $('.sede-cards-group').css('opacity', '0');

            // Esperar 300ms a que termine la animación de salida para cambiar la imagen y el grupo de tarjetas
            setTimeout(function() {
                // Intercambiar el mapa físico
                $('#mapaCobertura').attr('src', rutaMapaNuevo);

                // Activar el tooltip de la sede seleccionada
                if (sede === 'lima') {
                    $('#tooltipLima').addClass('show');
                } else if (sede === 'arequipa') {
                    $('#tooltipArequipa').addClass('show');
                }

                // Ocultar todas las tarjetas y mostrar las de la sede activa
                $('.sede-cards-group').addClass('d-none');
                $('#cards-' + sede).removeClass('d-none');
                
                // Forzar pequeño delay para gatillar la transición de entrada CSS de los badges de forma fluida
                setTimeout(function(){
                    $('#cards-' + sede).css('opacity', '1');
                }, 50);

                // Quitar animación de salida del mapa
                $('#mapaCobertura').removeClass('map-transitioning');
            }, 300);
        });
    });
</script>
<?= $this->endSection(); ?>