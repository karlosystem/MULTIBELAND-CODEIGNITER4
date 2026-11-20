<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('content'); ?>

<!-- ==========================================================================
SECCIÓN 1: HERO BANNER - TAPICERÍA INDUSTRIAL Y PROTECCIÓN OPERATIVA
========================================================================== -->
<section class="servicio-hero-section position-relative overflow-hidden"
    style="background: linear-gradient(to right, rgba(14, 46, 91, 0.92) 0%, rgba(14, 46, 91, 0.65) 50%, rgba(14, 46, 91, 0.15) 100%), 
    url('<?= base_url('frontend/images/servicios/banner-tapiceria.png') ?>') no-repeat center center;
    background-size: cover;
    min-height: 550px;
    display: flex;
    align-items: center;">

    <div class="container position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-lg-8 col-md-10">
                <h1 class="servicio-hero-title fw-bold mb-4 text-white">
                    Tapicería Industrial y <br class="d-none d-md-block">
                    Protección Operativa
                </h1>
                <div class="servicio-hero-subtitle-wrapper mb-5">
                    <p class="servicio-hero-subtitle text-white mb-0">
                        Soluciones de protección, aislamiento y recuperación estructural diseñadas para prolongar la vida útil de flotas mineras e industriales en entornos de alta exigencia.
                    </p>
                </div>
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
SECCIÓN 2: TRANSFORMACIÓN Y TAPIZADO DE CABINAS
========================================================================== -->
<section class="seccion-cabinas-showcase py-5 position-relative">
    <div class="container py-lg-4">
        <div class="row align-items-center g-4">

            <!-- COLUMNA IZQUIERDA: IMAGEN DIRECTA PNG -->
            <div class="col-lg-5 col-xl-5 text-center">
                <div class="circular-img-wrapper">
                    <img src="<?= base_url('frontend/images/servicios/circular.png') ?>"
                        alt="Transformación y Tapizado de Cabinas"
                        class="img-fluid drop-shadow-custom">
                </div>
            </div>

            <!-- COLUMNA DERECHA: TARJETA DE CONTENIDO CON SLIDER Y PUNTOS -->
            <div class="col-lg-7 col-xl-7">
                <div class="showcase-card-container position-relative ps-lg-4">


                    <!-- SLIDER DE IMAGEN CON FLECHAS -->
                    <div class="slider-image-wrapper position-relative mb-4">
                        <div class="slider-image-inner overflow-hidden rounded-4">
                            <img id="serviceMainImage"
                                src="<?= base_url('frontend/images/servicios/sliders/asiento01.png') ?>"
                                alt="Servicio de Tapicería Industrial"
                                class="img-fluid rounded-4 w-100 shadow-sm transition-img">
                        </div>

                        <!-- Botones de Navegación del Slider -->
                        <div class="slider-nav-buttons d-flex align-items-center gap-2">
                            <button class="btn btn-slider-nav btn-cyan shadow-sm" id="prevServiceBtn" type="button" title="Anterior">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-slider-nav btn-navy shadow-sm" id="nextServiceBtn" type="button" title="Siguiente">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- CONTENIDO DE PESTAÑA 01: ASIENTOS PERSONALIZADOS -->
                    <div class="service-tab-pane mt-5" id="tabContent01">
                        <div class="service-header">
                            <span class="header-line-cyan"></span>
                            <h3 class="service-tab-title">01. Asientos Personalizados</h3>
                        </div>

                        <p class="service-tab-subtitle">
                            Tapizado, reparación integral y fabricación de fundas personalizadas con el logo de tu marca.
                        </p>

                        <!-- Lista de 3 Ítems con Icono -->
                        <div class="features-list">
                            <div class="feature-item">
                                <div class="feature-icon-box">
                                    <i class="fas fa-couch"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="feature-title">Tapizado premium</h5>
                                    <p class="feature-text">Materiales de alta resistencia que brindan mayor confort y durabilidad.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon-box">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="feature-title">Reparación integral</h5>
                                    <p class="feature-text">Recuperamos la estructura y el acolchado para prolongar la vida útil del asiento.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon-box">
                                    <i class="fas fa-award"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="feature-title">Personalización de marca</h5>
                                    <p class="feature-text">Fabricamos fundas personalizadas con el logo de tu empresa para una imagen profesional.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CONTENIDO DE PESTAÑA 02: RESTAURACIÓN DE INTERIORES -->
                    <div class="service-tab-pane mt-5 d-none" id="tabContent02">
                        <div class="service-header">
                            <span class="header-line-cyan"></span>
                            <h3 class="service-tab-title">02. Restauración de Interiores</h3>
                        </div>

                        <p class="service-tab-subtitle">
                            Servicios integrales de reacondicionamiento y aislamiento para cabinas de maquinaria pesada.
                        </p>

                        <div class="features-list">
                            <div class="feature-item">
                                <div class="feature-icon-box">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="feature-title">Aislamiento térmico y acústico</h5>
                                    <p class="feature-text">Reducción de ruido y calor en la cabina para mayor confort del operador.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon-box">
                                    <i class="fas fa-paint-roller"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="feature-title">Renovación de paneles y techos</h5>
                                    <p class="feature-text">Restauración de revestimientos de vinil, tela y plásticos dañados por el trabajo rudo.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon-box">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="feature-content">
                                    <h5 class="feature-title">Mantenimiento preventivo</h5>
                                    <p class="feature-text">Evaluación y ajuste estructural de componentes para asegurar durabilidad en mina y obra.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- SECCIÓN: PROTECCIÓN DE COMPONENTES (COVERS) -->
<section class="covers-section py-5">
    <div class="container">
        <div class="row align-items-stretch g-4 g-lg-5">

            <!-- COLUMNA IZQUIERDA: IMAGEN CON INCLINACIÓN (SKEW) -->
            <!-- COLUMNA IZQUIERDA: IMAGEN PRINCIPAL -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="skewed-image-container">
                    <img id="coverMainImage"
                        src="<?= base_url('frontend/images/servicios/covers/cover01.png') ?>"
                        alt="Protección de Componentes Covers"
                        class="img-fluid cover-img-skewed">
                </div>
            </div>

            <!-- COLUMNA DERECHA: TEXTOS Y ACORDEÓN DE TARJETAS -->
            <div class="col-lg-6">
                <div class="covers-content ps-lg-3">

                    <!-- Título y Descripción Principal -->
                    <h2 class="covers-title mb-3 text-primero">Protección de Componentes (Covers)</h2>
                    <p class="covers-description text-tercero mb-4">
                        Ofrecemos el diseño y fabricación de fundas protectoras a la medida para cilindros hidráulicos, desarrolladas con materiales técnicos de grado industrial (Heavy Duty) y lonas resistentes al fuego, polvo y fluidos.
                    </p>

                    <!-- ACORDEÓN DE TARJETAS INTERACTIVAS (4 ITEMS) -->
                    <div class="covers-accordion d-flex flex-column gap-3">

                        <!-- Tarjeta 01 (Activa por defecto) -->
                        <div class="cover-card active" data-img="<?= base_url('frontend/images/servicios/covers/cover01.png') ?>">
                            <div class="cover-card-header">
                                <h4 class="cover-card-title m-0">Protección Total</h4>
                            </div>
                            <div class="cover-card-body">
                                <p class="m-0 text-primero">Blinda el vástago contra rayaduras, evita fugas de aceite y previene fallas prematuras en el sistema.</p>
                            </div>
                        </div>

                        <!-- Tarjeta 02 -->
                        <div class="cover-card" data-img="<?= base_url('frontend/images/servicios/covers/cover02.png') ?>">
                            <div class="cover-card-header">
                                <h4 class="cover-card-title m-0">Máxima Resistencia</h4>
                            </div>
                            <div class="cover-card-body">
                                <p class="m-0 text-primero">Confeccionadas con lonas técnicas de grado industrial y costuras reinforced para soportar condiciones extremas en mina y obra.</p>
                            </div>
                        </div>

                        <!-- Tarjeta 03 -->
                        <div class="cover-card" data-img="<?= base_url('frontend/images/servicios/covers/cover03.png') ?>">
                            <div class="cover-card-header">
                                <h4 class="cover-card-title m-0">Diseño a la Medida</h4>
                            </div>
                            <div class="cover-card-body">
                                <p class="m-0 text-primero">Fabricación adaptada a las especificaciones exactas del equipo para garantizar un ajuste perfecto y sin interferencias.</p>
                            </div>
                        </div>

                        <!-- Tarjeta 04 -->
                        <div class="cover-card" data-img="<?= base_url('frontend/images/servicios/covers/cover04.png') ?>">
                            <div class="cover-card-header">
                                <h4 class="cover-card-title m-0">Eficiencia Económica</h4>
                            </div>
                            <div class="cover-card-body">
                                <p class="m-0 text-primero">Reduce drásticamente los tiempos de parada no programada y prolonga la vida útil de los componentes hidráulicos de tu flota.</p>
                            </div>
                        </div>

                    </div> <!-- Fin Accordion -->

                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECCIÓN: BENEFICIOS OPERATIVOS -->
<section class="beneficios-section py-5">
    <div class="container position-relative">

        <!-- Imagen de fondo (Flechas decorativas sobresaliendo) -->
        <img src="<?= base_url('frontend/images/servicios/background_flechas.png') ?>"
            alt="Decoración Flechas"
            class="flechas-bg-img d-none d-lg-block">

        <!-- Tarjeta Principal de Beneficios -->
        <div class="beneficios-card">
            <div class="row align-items-center g-4">

                <!-- TÍTULO DE LA SECCIÓN (Izquierda) -->
                <div class="col-lg-4">
                    <h2 class="beneficios-title m-0">
                        Beneficios<br>Operativos
                    </h2>
                </div>

                <!-- LISTA DE BENEFICIOS (Derecha - 3 Columnas) -->
                <div class="col-lg-8">
                    <div class="row g-4 text-center">

                        <!-- Item 1: Máxima Durabilidad -->
                        <div class="col-md-4">
                            <div class="beneficio-item">
                                <div class="beneficio-icon-wrapper mb-3">
                                    <img src="<?= base_url('frontend/images/servicios/maxima-durabilidad.png') ?>"
                                        alt="Máxima Durabilidad"
                                        class="beneficio-icon">
                                </div>
                                <h4 class="beneficio-item-title mb-2">
                                    Máxima<br>Durabilidad
                                </h4>
                                <p class="beneficio-item-text m-0">
                                    Protección resistente para condiciones operativas exigentes.
                                </p>
                            </div>
                        </div>

                        <!-- Item 2: Ergonomía y Confort -->
                        <div class="col-md-4">
                            <div class="beneficio-item">
                                <div class="beneficio-icon-wrapper mb-3">
                                    <img src="<?= base_url('frontend/images/servicios/ergonomia-y-confort.png') ?>"
                                        alt="Ergonomía y Confort"
                                        class="beneficio-icon">
                                </div>
                                <h4 class="beneficio-item-title mb-2">
                                    Ergonomía y<br>Confort
                                </h4>
                                <p class="beneficio-item-text m-0">
                                    Menor fatiga, mayor comodidad y productividad.
                                </p>
                            </div>
                        </div>

                        <!-- Item 3: Cobertura Flexible -->
                        <div class="col-md-4">
                            <div class="beneficio-item">
                                <div class="beneficio-icon-wrapper mb-3">
                                    <img src="<?= base_url('frontend/images/servicios/cobertura-flexible.png') ?>"
                                        alt="Cobertura Flexible"
                                        class="beneficio-icon">
                                </div>
                                <h4 class="beneficio-item-title mb-2">
                                    Cobertura<br>Flexible
                                </h4>
                                <p class="beneficio-item-text m-0">
                                    Atención en taller o campo con alcance en el sur del Perú.
                                </p>
                            </div>
                        </div>

                    </div>
                </div> <!-- Fin Columna Derecha -->

            </div>
        </div> <!-- Fin Beneficios Card -->

    </div>
</section>

<?= $this->include('frontend/partials/clientes-carousel') ?>

<?= $this->include('frontend/partials/serviciosadicionales-carousel') ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {

        $('.cover-card').on('click', function() {
            // Si ya está activa no repite el evento
            if ($(this).hasClass('active')) return;

            // Desactivar todas las tarjetas
            $('.cover-card').removeClass('active');

            // Activar la tarjeta seleccionada
            $(this).addClass('active');

            // Cambiar la imagen del marco en paralelogramo
            const newImgSrc = $(this).attr('data-img');
            if (newImgSrc) {
                $('#coverMainImage').css('opacity', '0.2');
                setTimeout(function() {
                    $('#coverMainImage').attr('src', newImgSrc).css('opacity', '1');
                }, 200);
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

        // Listas de imágenes por cada sección
        const sliderGroups = {
            1: [
                "<?= base_url('frontend/images/servicios/sliders/asiento01.png') ?>",
                "<?= base_url('frontend/images/servicios/sliders/asiento02.png') ?>",
                "<?= base_url('frontend/images/servicios/sliders/asiento03.png') ?>"
            ],
            2: [
                "<?= base_url('frontend/images/servicios/sliders/cabina01.png') ?>",
                "<?= base_url('frontend/images/servicios/sliders/cabina02.png') ?>",
                "<?= base_url('frontend/images/servicios/sliders/cabina03.png') ?>"
            ]
        };

        let currentTab = 1;
        let currentImgIndex = 0;
        let autoPlayTimer = null;
        const autoPlayDelay = 2000; // Tiempo en ms (4 segundos)

        // Función para actualizar la vista
        function updateSlider(tab, imgIndex) {
            currentTab = tab;
            currentImgIndex = imgIndex;

            // Transición de contenido entre pestañas
            if (currentTab === 1) {
                if ($('#tabContent01').hasClass('d-none')) {
                    $('#tabContent02').fadeOut(150, function() {
                        $(this).addClass('d-none');
                        $('#tabContent01').removeClass('d-none').fadeIn(150);
                    });
                }
            } else {
                if ($('#tabContent02').hasClass('d-none')) {
                    $('#tabContent01').fadeOut(150, function() {
                        $(this).addClass('d-none');
                        $('#tabContent02').removeClass('d-none').fadeIn(150);
                    });
                }
            }

            // Transición suave de la imagen
            const newImageSrc = sliderGroups[currentTab][currentImgIndex];
            $('#serviceMainImage').css('opacity', 0.2);

            setTimeout(() => {
                $('#serviceMainImage').attr('src', newImageSrc).css('opacity', 1);
            }, 150);
        }

        // Lógica para avanzar a la siguiente imagen
        function nextSlide() {
            currentImgIndex++;
            if (currentImgIndex >= sliderGroups[currentTab].length) {
                currentImgIndex = 0;
                currentTab = (currentTab === 1) ? 2 : 1;
            }
            updateSlider(currentTab, currentImgIndex);
        }

        // Lógica para retroceder a la imagen anterior
        function prevSlide() {
            currentImgIndex--;
            if (currentImgIndex < 0) {
                currentTab = (currentTab === 1) ? 2 : 1;
                currentImgIndex = sliderGroups[currentTab].length - 1;
            }
            updateSlider(currentTab, currentImgIndex);
        }

        // --- CONTROL DE AUTOPLAY ---
        function startAutoplay() {
            stopAutoplay(); // Limpiar previo para evitar duplicados
            autoPlayTimer = setInterval(nextSlide, autoPlayDelay);
        }

        function stopAutoplay() {
            if (autoPlayTimer) {
                clearInterval(autoPlayTimer);
            }
        }

        function resetAutoplay() {
            stopAutoplay();
            startAutoplay();
        }

        // Eventos manuales de botones (reinician el temporizador)
        $('#nextServiceBtn').on('click', function() {
            nextSlide();
            resetAutoplay();
        });

        $('#prevServiceBtn').on('click', function() {
            prevSlide();
            resetAutoplay();
        });

        // Pausar el Autoplay cuando el mouse está sobre la tarjeta/imagen
        $('.showcase-card-container').on('mouseenter', function() {
            stopAutoplay();
        }).on('mouseleave', function() {
            startAutoplay();
        });

        // Iniciar Autoplay al cargar la página
        startAutoplay();
    });
</script>


<?= $this->endSection(); ?>