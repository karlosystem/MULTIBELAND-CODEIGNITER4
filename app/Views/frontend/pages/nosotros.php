<?= $this->extend('frontend/layout/pages-layout'); ?>
<?= $this->section('content'); ?>

<!-- SECCIÓN 1: HERO BANNER -->
<section class="nosotros-hero-section position-relative overflow-hidden"
    style="background: linear-gradient(to right, rgba(14, 46, 91, 0.95) 0%, rgba(14, 46, 91, 0.7) 50%, rgba(14, 46, 91, 0.3) 100%), 
    url('<?= base_url('frontend/images/nosotros/banner-principal.png') ?>') no-repeat center center;
    background-size: cover;
    min-height: 500px;
    display: flex;
    align-items: center;">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-lg-7 col-md-8">
                <h1 class="fw-bold mb-4 text-white"
                    style="font-size: 2.8rem; line-height: 1.2; font-family: 'Open Sauce', sans-serif;">
                    Mantenimiento Especializado y Reacondicionamiento de Maquinaria Pesada de Alto Rendimiento
                </h1>
                <p class="mb-0 text-white"
                    style="font-size: 1.1rem; line-height: 1.7; max-width: 600px; opacity: 0.9;">
                    Somos una empresa peruana especializada en servicios de reconstrucción estructural y de minas.
                    Desde 2010, hemos dedicado nuestro tiempo de extender la vida útil de los equipos más exigentes del mercado.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CINTA DE MARCAS -->
<?= $this->include('frontend/partials/brand-belt') ?>

<!-- SECCIÓN: MISIÓN Y VISIÓN CON EFECTO TRANSFORMACIÓN TRACTOR -->
<section class="py-5 mision-vision-section position-relative overflow-hidden" style="background-color: #F6FAFD;">
    <!-- Patrón decorativo de puntos -->
    <div class="dot-pattern-mision"></div>

    <div class="container py-md-3 position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <!-- Columna de Texto (Misión y Visión) -->
            <div class="col-lg-6 mb-lg-0 mb-5">

                <!-- Misión -->
                <div class="mb-5">
                    <div class="badge-mision-vision d-inline-flex align-items-center mb-3 px-4 py-2">
                        <img src="<?= base_url('frontend/images/nosotros/arrow_cyan.png') ?>"
                            alt="Flechas"
                            class="badge-arrow-icon">
                        <h2 class="badge-mision-vision-title mb-0 ml-3">Misión</h2>
                    </div>
                    <p class="text-cyan mt-3" style="font-size: 1.05rem; line-height: 1.7; max-width: 500px;">
                        En MultiBeland, damos una segunda vida a la maquinaria pesada mediante soluciones especializadas de recuperación, protección y reacondicionamiento que maximizan la seguridad, el rendimiento y la continuidad operativa.
                    </p>
                </div>

                <!-- Visión -->
                <div>
                    <div class="badge-mision-vision d-inline-flex align-items-center mb-3 px-4 py-2">
                        <img src="<?= base_url('frontend/images/nosotros/arrow_cyan.png') ?>"
                            alt="Flechas"
                            class="badge-arrow-icon">
                        <h2 class="badge-mision-vision-title mb-0 ml-3">Visión</h2>
                    </div>
                    <p class="text-cyan mt-3" style="font-size: 1.05rem; line-height: 1.7; max-width: 500px;">
                        Para el 2030, ser la compañía líder que redefine el rendimiento minero e industrial en el Perú.
                    </p>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="tractor-transform-container">
                    <div class="before-after-wrapper" id="tractorSlider">

                        <!-- Imagen de Fondo (DESPUÉS - Tractor Reparado) -->
                        <img src="<?= base_url('frontend/images/nosotros/TRACTOR_REPARADO.png') ?>" alt="Tractor Reparado" class="after-image">

                        <!-- Imagen Superpuesta (ANTES - Tractor Viejo) -->
                        <img src="<?= base_url('frontend/images/nosotros/TRACTOR_VIEJO.png') ?>" alt="Tractor Viejo" class="before-image auto-animate" id="beforeImg">

                        <!-- Etiquetas de Estado (Opcionales) -->
                        <span class="label-before">Antes</span>
                        <span class="label-after">Después</span>

                        <!-- Línea Divisoria con su Handle -->
                        <div class="divider-line auto-animate" id="sliderDivider">
                            <div class="divider-handle">

                            </div>
                        </div>

                    </div>
                    <p class="tractor-transform-hint text-center mt-3">
                        <span class="fa fa-info-circle text-cyan"></span> Arrastra la barra para ver la transformación completa.
                    </p>
                </div>
            </div>

        </div>

        <!-- ==========================================================================
     FILA: PILARES INSTITUCIONALES (TEXTO + FLECHAS GRANDES CORREGIDAS)
     ========================================================================== -->
        <div class="row align-items-center mt-5 pt-4 position-relative z-index-2">
            <!-- Columna del Texto Promocional -->
            <div class="col-lg-7 col-md-8">
                <h4 class="pilar-brand-text">
                    Ingeniería humana y precisión técnica: los pilares institucionales detrás de cada intervención en campo y taller
                </h4>
            </div>

            <!-- Columna de las Flechas Dinámicas -->
            <div class="col-lg-5 col-md-4 d-flex align-items-center justify-content-md-end justify-content-start mt-4 mt-md-0">
                <div class="animated-arrows-container">
                    <!-- Flecha 1 (Robusta con Borde) -->
                    <svg class="svg-block-arrow arrow-outline arrow-1" viewBox="0 0 100 80">
                        <path d="M 5 25 H 50 V 5 L 95 40 L 50 75 V 55 H 5 Z" />
                    </svg>
                    <!-- Flecha 2 (Robusta Rellena) -->
                    <svg class="svg-block-arrow arrow-filled arrow-2" viewBox="0 0 100 80">
                        <path d="M 5 25 H 50 V 5 L 95 40 L 50 75 V 55 H 5 Z" />
                    </svg>
                    <!-- Flecha 3 (Robusta con Borde) -->
                    <svg class="svg-block-arrow arrow-outline arrow-3" viewBox="0 0 100 80">
                        <path d="M 5 25 H 50 V 5 L 95 40 L 50 75 V 55 H 5 Z" />
                    </svg>
                </div>
            </div>
        </div>


    </div>
</section>

<!-- ==========================================================================
     SECCIÓN: NUESTRO EQUIPO DE TRABAJO (NUEVA SECCIÓN)
     ========================================================================== -->
<!-- ==========================================================================
     SECCIÓN: NUESTRO EQUIPO DE TRABAJO (ANCHO COMPLETO - SIN PADDINGS)
     ========================================================================== -->
<section class="team-section position-relative">
    <!-- Patrón de puntos decorativo lateral izquierdo (detrás del fundido) -->
    <div class="dot-pattern-team"></div>

    <!-- Contenedor directo sin límites de ancho (100% Edge-to-Edge) -->
    <div class="team-image-wrapper position-relative z-index-2">
        <img src="<?= base_url('frontend/images/nosotros/equipo.png') ?>"
            alt="Equipo de Trabajo MultiBeland"
            class="team-photo-full"
            loading="lazy">
    </div>
</section>

<!-- ==========================================================================
     SECCIÓN: NUESTROS PILARES OPERATIVOS
     ========================================================================== -->
<section class="pilares-section position-relative py-5">
    <!-- Barrido de puntos con desvanecido CSS -->
    <div class="dot-pattern-pilares"></div>

    <div class="container position-relative z-index-2 py-4">
        <!-- Grid responsivo de 3 columnas (1 en móvil, 2 en tablet, 3 en desktop) -->
        <!-- Reemplaza la línea del row por esta: -->
        <div class="row g-4 gy-5 row-cols-1 row-cols-md-2 row-cols-lg-3 align-items-stretch">

            <!-- 1. Bloque de Título (Fila 1 - Columna 1) -->
            <div class="col d-flex flex-column justify-content-center">
                <div class="pilares-title-container">
                    <span class="pilares-subtitle">Nuestros</span>
                    <h2 class="pilares-title">pilares <br>operativos</h2>
                </div>
            </div>

            <!-- 2. Tarjeta: Confianza Comercial (Fila 1 - Columna 2) -->
            <div class="col">
                <div class="pilar-card h-100">
                    <h3 class="pilar-card-title">Seguridad Absoluta</h3>
                    <p class="pilar-card-text">
                        Cero accidentes, protección total del operador en entornos críticos.
                    </p>
                </div>
            </div>

            <!-- 3. Tarjeta: Confianza Comercial (Fila 1 - Columna 3) -->
            <div class="col">
                <div class="pilar-card h-100">
                    <h3 class="pilar-card-title">Precisión y Velocidad Técnica</h3>
                    <p class="pilar-card-text">
                        Diagnósticos certeros y ejecución rápida en taller o campo para minimizar el downtime.
                    </p>
                </div>
            </div>

            <!-- 4. Tarjeta: Confianza Comercial (Fila 2 - Columna 1 -> Queda abajo del título) -->
            <div class="col">
                <div class="pilar-card h-100">
                    <h3 class="pilar-card-title">Disponibilidad Inmediata</h3>
                    <p class="pilar-card-text">
                        Soporte logístico, abastecimiento de consumibles y respuesta operativa donde y cuando tu proyecto lo demande.
                    </p>
                </div>
            </div>

            <!-- 5. Tarjeta: Confianza Comercial (Fila 2 - Columna 2) -->
            <div class="col">
                <div class="pilar-card h-100">
                    <h3 class="pilar-card-title">Calidad Certificada </h3>
                    <p class="pilar-card-text">
                        Materiales Heavy Duty, procesos estandarizados y procedimientos bajo exigentes normativas mineras.
                    </p>
                </div>
            </div>

            <!-- 6. Tarjeta: Confianza Comercial (Fila 2 - Columna 3) -->
            <div class="col">
                <div class="pilar-card h-100">
                    <h3 class="pilar-card-title">Confianza Comercial</h3>
                    <p class="pilar-card-text">
                        Transparencia, cumplimiento estricto de plazos y respaldo post-servicio con trazabilidad técnica.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->include('frontend/partials/clientes-carousel') ?>

<!-- ==========================================================================
SECCIÓN: TAMBIÉN PODEMOS AYUDARTE CON (CARRUSEL DE SERVICIOS ADICIONALES)
========================================================================== -->
<section class="servicios-adicionales-section py-5" style="background-color: #F6FAFD;">
    <div class="container">
        <h3 class="text-center fw-bold mb-5" style="color: #0E2E5B; font-size: 1.8rem; font-family: 'Open Sauce', sans-serif;">
            También podemos ayudarte con:
        </h3>

        <div class="owl-servicios-adicionales owl-carousel owl-theme">
            <!-- Servicio 1: Soldadura Industrial (Destacado - Fondo Azul) -->
            <div class="item">
                <div class="servicio-adicional-card card-dark p-4 rounded-4 text-center"
                    style="background-color: #0E2E5B; min-height: 220px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="<?= base_url('frontend/images/nosotros/soldadura_industrial_blanco.png') ?>"
                        alt="Soldadura Industrial"
                        class="servicio-icono"
                        style="width: 90px; height: 90px; margin-bottom: 15px;">
                    <h5 class="text-white fw-bold mb-0" style="font-size: 1.1rem; font-family: 'Open Sauce', sans-serif;">
                        Soldadura Industrial
                    </h5>
                </div>
            </div>

            <!-- Servicio 2: Pintura Industrial -->
            <div class="item">
                <div class="servicio-adicional-card card-light p-4 rounded-4 text-center"
                    style="background-color: #ffffff; border: 2px solid #E2E8F0; min-height: 220px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="<?= base_url('frontend/images/nosotros/pintura_azul.png') ?>"
                        alt="Pintura Industrial"
                        class="servicio-icono"
                        style="width: 90px; height: 90px; margin-bottom: 15px;">
                    <h5 class="fw-bold mb-0">
                        Pintura Industrial
                    </h5>
                </div>
            </div>

            <!-- Servicio 3: Reestructuración de Cabinas -->
            <div class="item">
                <div class="servicio-adicional-card card-light p-4 rounded-4 text-center"
                    style="background-color: #ffffff; border: 2px solid #E2E8F0; min-height: 220px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="<?= base_url('frontend/images/nosotros/reestructuracion_cabina_azul.png') ?>"
                        alt="Reestructuración de Cabinas"
                        class="servicio-icono"
                        style="width: 90px; height: 90px; margin-bottom: 15px;">
                    <h5 class="fw-bold mb-0" style="color: #0E2E5B; font-size: 1.1rem; font-family: 'Open Sauce', sans-serif;">
                        Reestructuración de Cabinas
                    </h5>
                </div>
            </div>

            <!-- Servicio 4: Vidriería y Estandarización -->
            <div class="item">
                <div class="servicio-adicional-card card-light p-4 rounded-4 text-center"
                    style="background-color: #ffffff; border: 2px solid #E2E8F0; min-height: 220px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="<?= base_url('frontend/images/nosotros/vidrieria_azul.png') ?>"
                        alt="Vidriería y Estandarización"
                        class="servicio-icono"
                        style="width: 90px; height: 90px; margin-bottom: 15px;">
                    <h5 class="fw-bold mb-0" style="color: #0E2E5B; font-size: 1.1rem; font-family: 'Open Sauce', sans-serif;">
                        Vidriería y Estandarización
                    </h5>
                </div>
            </div>

            <!-- Servicio 5: Reacondicionamiento -->
            <div class="item">
                <div class="servicio-adicional-card card-light p-4 rounded-4 text-center"
                    style="background-color: #ffffff; border: 2px solid #E2E8F0; min-height: 220px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="<?= base_url('frontend/images/nosotros/reacondicionamiento_azul.png') ?>"
                        alt="Reacondicionamiento"
                        class="servicio-icono"
                        style="width: 90px; height: 90px; margin-bottom: 15px;">
                    <h5 class="fw-bold mb-0" style="color: #0E2E5B; font-size: 1.1rem; font-family: 'Open Sauce', sans-serif;">
                        Reacondicionamiento
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const wrapper = document.getElementById('tractorSlider');
        const beforeImage = document.getElementById('beforeImg');
        const divider = document.getElementById('sliderDivider');

        if (!wrapper || !beforeImage || !divider) return;

        let isDragging = false;

        // Desactiva la animación CSS inicial para dar paso al control del usuario
        function stopAutoAnimation() {
            beforeImage.classList.remove('auto-animate');
            divider.classList.remove('auto-animate');
        }

        // Calcula y renderiza la posición del slider
        function updateSlider(clientX) {
            const rect = wrapper.getBoundingClientRect();
            let posX = clientX - rect.left;
            let percentage = (posX / rect.width) * 100;

            // Acotar porcentaje entre 0 y 100
            if (percentage < 0) percentage = 0;
            if (percentage > 100) percentage = 100;

            // Renderizar cambios en tiempo real
            divider.style.left = `${percentage}%`;
            beforeImage.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;
        }

        // --- EVENTOS DESKTOP (MOUSE) ---
        wrapper.addEventListener('mousedown', (e) => {
            isDragging = true;
            stopAutoAnimation();
            updateSlider(e.clientX);
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            updateSlider(e.clientX);
        });

        window.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // --- EVENTOS MÓVILES (TOUCH) ---
        wrapper.addEventListener('touchstart', (e) => {
            isDragging = true;
            stopAutoAnimation();
            updateSlider(e.touches[0].clientX);
        });

        window.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            e.preventDefault(); // Evita que la pantalla se mueva verticalmente mientras arrastras
            updateSlider(e.touches[0].clientX);
        }, {
            passive: false
        });

        window.addEventListener('touchend', () => {
            isDragging = false;
        });
    });

    $(document).ready(function() {
        // Carrusel de Servicios Adicionales
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