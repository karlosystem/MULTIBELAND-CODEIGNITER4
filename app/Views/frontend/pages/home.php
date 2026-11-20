<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('page_meta'); ?>
<meta name="robots" content="index, follow">
<meta name="title" content="<?= get_settings()->blog_title ?>">
<meta name="description" content="<?= get_settings()->blog_meta_description ?>">
<meta name="keywords" content="<?= get_settings()->blog_meta_keywords ?>">
<link rel="canonical" href="<?= base_url() ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="w3l-hero-split py-5 bg-white">
    <div class="container py-md-4">
        <div class="row align-items-center">

            <div class="col-lg-5 d-none d-lg-block mb-lg-0 mb-5 text-lg-left text-center">
                <h2 class="hero-title">Servicios <br>
                    <span class="text-cyan">especializados</span>
                </h2>
                <div class="hero-arrows mt-4 d-none d-lg-flex justify-content-start">
                    <!-- Flecha izquierda (Solid) -->
                    <button class="btn arrow-custom-prev mr-3" onclick="$('.owl-one').trigger('prev.owl.carousel')" aria-label="Anterior"></button>

                    <!-- Flecha derecha (Outline) -->
                    <button class="btn arrow-custom-next" onclick="$('.owl-one').trigger('next.owl.carousel')" aria-label="Siguiente"></button>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="hero-slider-wrapper shadow rounded-4 overflow-hidden">
                    <div class="owl-one owl-carousel owl-theme">
                        <?php foreach (get_banners_all() as $banners_all): ?>
                            <div class="item">
                                <div class="slider-bg-card position-relative" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.4)), url(images/banners/<?= $banners_all->image ?>); height: 420px; background-size: cover; background-position: center;">
                                    <div class="slider-caption-overlay position-absolute bottom-0 start-0 p-4">
                                        <span style="border: 2px solid #00A4C5; background-color: rgba(10, 25, 47, 0.5);" class="badge text-white px-3 py-2 rounded-pill mb-2">
                                            <?= $banners_all->name ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-2 brand-belt-grey" style="background-color: #3883B2;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Columna del Texto -->
            <div class="col-lg-3 col-md-5 mb-3 mb-md-0">
                <p class="font-weight-bold mb-0 text-white" style="font-size: 2.0rem; letter-spacing: 1px; line-height: 1.4;">
                    Experiencia en Marcas Líderes
                </p>
            </div>

            <!-- Columna del Carrusel de Logos -->
            <div class="col-lg-9 col-md-7">
                <div id="owl-brands" class="owl-carousel owl-theme">
                    <div class="brand-logo-item">
                        <img src="<?= base_url('frontend/images/marcas/cat.png') ?>" alt="CAT" class="brand-img logo-cat">
                    </div>
                    <div class="brand-logo-item">
                        <img src="<?= base_url('frontend/images/marcas/hitachi.png') ?>" alt="Hitachi" class="brand-img logo-hitachi">
                    </div>
                    <div class="brand-logo-item">
                        <img src="<?= base_url('frontend/images/marcas/komatsu.png') ?>" alt="Komatsu" class="brand-img logo-komatsu">
                    </div>
                    <div class="brand-logo-item">
                        <img src="<?= base_url('frontend/images/marcas/doosan.png') ?>" alt="Doosan" class="brand-img logo-doosan">
                    </div>
                    <div class="brand-logo-item">
                        <img src="<?= base_url('frontend/images/marcas/volvo.png') ?>" alt="Volvo" class="brand-img logo-volvo">
                    </div>
                    <div class="brand-logo-item">
                        <img src="<?= base_url('frontend/images/marcas/jcb.png') ?>" alt="JCB" class="brand-img logo-jcb">
                    </div>
                    <div class="brand-logo-item">
                        <img src="<?= base_url('frontend/images/marcas/johndeere.png') ?>" alt="John Deere" class="brand-img logo-johndeere">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5 section-trayectoria position-relative" style="background-color: #F6FAFD; overflow: hidden;">

    <!-- 🌟 NUEVO: Elemento decorativo de flechas solo en esquina superior derecha -->
    <div class="arrow-pattern-corner"></div>

    <div class="container py-md-3 position-relative" style="z-index: 2;">
        <p class="text-center text-cyan font-weight-semibold mb-4" style="font-size: 1.65rem;">Conozca nuestra trayectoria y compromiso con los más altos estándares mineros en el Perú.</p>
        <div class="row align-items-center mt-5">
            <div class="col-lg-5 mb-lg-0 mb-4">
                <div class="p-2 overflow-hidden">
                    <img src="<?= base_url('frontend/images/quienes-somos.png') ?>" class="img-fluid rounded-4 w-100" style="height: 400px; object-fit: cover;" alt="Operaciones Multi Beland">
                </div>
            </div>
            <div class="col-lg-7 pl-lg-5">
                <h3 class="fw-bold mb-3" style="color: #2175A8 !important;">Buscamos la continuidad operativa para tu maquinaria pesada</h3>
                <p class="text-secondary mb-4">
                    Especialistas en mantenimiento de maquinarias pesadas y componentes industriales con distintas soluciones para Maquinaria Pesada y mantenimientos predictivos y correctivos en el Perú.
                </p>
                <ul class="list-unstyled mb-4 connected-step-list">
                    <li class="d-flex align-items-center mb-4">
                        <span class="step-bullet mr-3"></span>
                        <span class="font-weight-medium text-cyan">Ingeniería en Campo y Taller</span>
                    </li>
                    <li class="d-flex align-items-center mb-4">
                        <span class="step-bullet mr-3"></span>
                        <span class="font-weight-medium text-cyan">Soporte Logístico</span>
                    </li>
                    <li class="d-flex align-items-center mb-0">
                        <span class="step-bullet mr-3"></span>
                        <span class="font-weight-medium text-cyan">Respuesta Rápida</span>
                    </li>
                </ul>
                <a href="https://www.calameo.com/read/00826240139c6bec350db" target="_blank" class="btn btn-outline-navy rounded-pill px-4 font-weight-bold btn-brochure">
                    BROCHURE 2026
                </a>
            </div>
        </div>
    </div>
</section>


<section class="py-5 bg-white">
    <div class="container py-md-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title-modern mb-3">Nuestros servicios</h2>
            <p class="text-muted sub-title-modern text-cyan">Presencia estratégica, soporte técnico y servicios especializados para maquinaria pesada en los sectores minero e industrial del Perú.</p>
        </div>

        <div class="row">

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-0 service-card-modern position-relative overflow-hidden shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="<?= base_url('frontend/images/categorias/pintura_industrial.png') ?>" class="card-img-top" alt="Pintura Industrial">
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-center justify-content-between card-service-overlay">
                        <span class="service-badge-pill">
                            Pintura Industrial </span>
                        <a href="#" class="service-chevron-arrow" aria-label="Ver Pintura Industrial">
                        </a>
                    </div>
                </div>
            </div>

             <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-0 service-card-modern position-relative overflow-hidden shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="<?= base_url('frontend/images/categorias/tapiceria_industrial.png') ?>" class="card-img-top" alt="Tapiceria Industrial">
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-center justify-content-between card-service-overlay">
                        <span class="service-badge-pill">
                            Tapicería Industrial y Protección Operativa </span>
                        <a href="#" class="service-chevron-arrow" aria-label="Ver Tapiceria Industrial">
                        </a>
                    </div>
                </div>
            </div>

            
             <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-0 service-card-modern position-relative overflow-hidden shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="<?= base_url('frontend/images/categorias/restauracion_cabinas.png') ?>" class="card-img-top" alt="restauracion de cabinas">
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-center justify-content-between card-service-overlay">
                        <span class="service-badge-pill">
                            Restauración de cabinas </span>
                        <a href="#" class="service-chevron-arrow" aria-label="Ver Tapiceria Industrial">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-0 service-card-modern position-relative overflow-hidden shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="<?= base_url('frontend/images/categorias/vidrieria_industrial.png') ?>" class="card-img-top" alt="Vidrieria Industrial">
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-center justify-content-between card-service-overlay">
                        <span class="service-badge-pill">
                            Vidrieria Industrial y Estandarizacion</span>
                        <a href="#" class="service-chevron-arrow" aria-label="Ver Tapiceria Industrial">
                        </a>
                    </div>
                </div>
            </div>

             <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-0 service-card-modern position-relative overflow-hidden shadow-sm">
                    <div class="card-img-wrapper">
                        <img src="<?= base_url('frontend/images/categorias/soldadura_industrial.png') ?>" class="card-img-top" alt="Soldadura Industrial">
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-center justify-content-between card-service-overlay">
                        <span class="service-badge-pill">
                            Soldadura Industrial</span>
                        <a href="#" class="service-chevron-arrow" aria-label="Ver Tapiceria Industrial">
                        </a>
                    </div>
                </div>
            </div>


        </div>

    </div>
</section>

<?= $this->include('frontend/partials/clientes-carousel') ?>

<section class="w3l-hero-split py-5 lead-capture-modern-section section-cotizacion">
    <div class="container py-md-4">
        <div class="row align-items-center">

            <div class="col-lg-5 text-white align-self-end operator-footer-colum">
                <h6 class="text-uppercase font-weight-bold mb-2 text-cyan" style="letter-spacing: 2px; font-size: 0.85rem;">
                    Contacto Directo
                </h6>
                <h2 class="font-weight-bold mb-3 text-white" style="font-size: 2.3rem; line-height: 1.2;">
                    Comunícate con nosotros
                </h2>
                <p class="text-light mb-4" style="opacity: 0.85; font-size: 0.95rem; line-height: 1.65;">
                    Si requieres de alguno de nuestros servicios o tienes alguna duda, déjanos tus datos y un asesor especializado se pondrá en contacto contigo a la brevedad.
                </p>

                <div class="contact-quick-info-box mt-4">
                    <!-- ... (Tus tres bloques d-flex de Teléfono, Correo y Ubicación se mantienen intactos aquí) ... -->
                </div> <!-- /contact-quick-info-box -->


                <!-- 🌟 NUEVO: Contenedor optimizado para la imagen del operario -->
                <div class="operator-modern-card d-none d-lg-block">
                    <img src="<?= base_url('frontend/images/operario_multibeland.png') ?>" alt="Especialista Multibeland" class="img-fluid operator-flush-img">
                </div>

            </div>

            <div class="col-lg-7">
                <div class="card lead-form-card border-0 p-4 p-md-5 shadow-lg" style="border-radius: 16px; background-color: #ffffff;">
                    <h4 class="font-weight-bold mb-1 text-dark" style="font-size: 1.2rem; letter-spacing: -0.5px;">
                        Solicitar una evaluación técnica o cotización de servicio
                    </h4>
                    <p class="text-muted mb-4" style="font-size: 0.9rem;">
                        Complete los campos obligatorios y le responderemos en el menor tiempo posible.
                    </p>

                    <form action="<?= base_url('contact-us') ?>" method="POST" enctype="multipart/form-data" class="lead-form-modern">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="lead-label-custom">Empresa</label>
                                <!-- 🌟 AGREGADO: form-control-sm -->
                                <input type="text" name="empresa" class="form-control form-control-sm lead-input-style" placeholder="Nombre de su empresa" required>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label class="lead-label-custom">R.U.C.</label>
                                <!-- 🌟 AGREGADO: form-control-sm -->
                                <input type="text" name="ruc" class="form-control form-control-sm lead-input-style" placeholder="12345678901" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="lead-label-custom">Nombre y Apellidos</label>
                                <!-- 🌟 AGREGADO: form-control-sm -->
                                <input type="text" name="name" class="form-control form-control-sm lead-input-style" placeholder="Nombre y Apellido" required>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label class="lead-label-custom">Correo Electrónico</label>
                                <!-- 🌟 AGREGADO: form-control-sm -->
                                <input type="email" name="email" class="form-control form-control-sm lead-input-style" placeholder="ejemplo@correo.com" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="lead-label-custom">Teléfono / Celular</label>
                                <!-- 🌟 AGREGADO: form-control-sm -->
                                <input type="tel" name="phone" class="form-control form-control-sm lead-input-style" placeholder="999 999 999" required>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label class="lead-label-custom">Tipo de Requerimiento</label>
                                <!-- 🌟 AGREGADO: form-select-sm -->
                                <select name="type" class="form-select form-select-sm lead-input-style" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="servicio">Servicio Técnico</option>
                                    <option value="repuesto">Repuesto</option>
                                    <option value="maquinaria">Maquinaria</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 form-group mb-3">
                                <label class="lead-label-custom">Tipo de Maquinaria / Flota</label>
                                <select name="maquinaria" class="form-select form-select-sm lead-input-style" required>
                                    <option value="">Elegir Tipo de Maquinaria</option>
                                    <option value="excavadora">Excavadora</option>
                                    <option value="cargador">Cargador</option>
                                    <option value="camion">Camión</option>
                                    <option value="bulldozer">Bulldozer</option>
                                    <option value="otros">Otros</option>
                                </select>
                            </div>
                            <!-- Provincia pasa a ocupar la mitad izquierda de forma limpia -->
                            <div class="col-md-6 form-group mb-3">
                                <label class="lead-label-custom">Provincia</label>
                                <select name="provincia" class="form-select form-select-sm lead-input-style" required>
                                    <option value="">Elegir Provincia</option>
                                    <option value="apurimac">Apurímac</option>
                                    <option value="arequipa">Arequipa</option>
                                    <option value="ayacucho">Ayacucho</option>
                                    <option value="cusco">Cusco</option>
                                    <option value="ica">Ica</option>
                                    <option value="lima">Lima</option>
                                    <option value="moquegua">Moquegua</option>
                                    <option value="puno">Puno</option>
                                    <option value="tacna">Tacna</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <!-- El Control Dropzone se expande al ancho completo antes de la caja de requerimientos -->
                            <div class="col-12 form-group mb-3">
                                <label class="lead-label-custom d-flex align-items-center flex-wrap" style="gap: 6px;">
                                    <span class="fa fa-paperclip text-secondary"></span>
                                    <strong>Adjuntar archivos</strong>
                                    <span class="text-muted font-weight-normal" style="font-size: 0.78rem;">(opcional · JPG, PNG, PDF, Excel · máx. 10MB c/u · hasta 5 archivos)</span>
                                </label>

                                <!-- Área Dropzone Interactiva (Oculta el input original y maneja el evento de click) -->
                                <div class="dropzone-custom-wrapper" id="dropzoneWrapper">
                                    <input type="file" name="files[]" id="fileInput" multiple accept=".jpg,.jpeg,.png,.pdf,.xls,.xlsx" class="d-none">
                                    <div class="dropzone-content text-center py-4">
                                        <span class="fa fa-upload d-block mb-2 dropzone-icon"></span>
                                        <p class="mb-1 dropzone-text">Arrastra tus archivos aquí o <span class="text-cyan font-weight-bold">haz clic para seleccionar</span></p>
                                        <small class="text-muted text-uppercase d-block" style="font-size: 0.7rem; letter-spacing: 0.5px;">JPG · PNG · PDF · XLS · XLSX</small>
                                    </div>
                                </div>

                                <!-- Contenedor dinámico donde aparecerá la lista de vista previa -->
                                <div id="filePreviewContainer" class="mt-2 d-flex flex-column" style="gap: 8px;"></div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="lead-label-custom">Requerimiento / Detalle de Productos</label>
                            <!-- 🌟 AGREGADO: form-control-sm y bajamos filas de 4 a 3 para compactar el diseño -->
                            <textarea name="message" class="form-control form-control-sm lead-input-style" rows="3" placeholder="Detalle brevemente el servicio técnico, repuesto o maquinaria que solicita..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-submit-lead w-100 py-2.5 font-weight-bold text-uppercase">
                            Solicitar Evaluación / Cotización
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>

<!-- 🌟 COLOCA EL JAVASCRIPT AQUÍ ABAJO: -->
<?= $this->section('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropzone = document.getElementById('dropzoneWrapper');
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('filePreviewContainer');

        let dataTransferContainer = new DataTransfer();

        dropzone.addEventListener('click', () => fileInput.click());

        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropzone.classList.add('dragover');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropzone.classList.remove('dragover');
            }, false);
        });

        dropzone.addEventListener('drop', (e) => {
            handleFiles(e.dataTransfer.files);
        });

        fileInput.addEventListener('change', () => {
            handleFiles(fileInput.files);
        });

        function handleFiles(files) {
            const maxFiles = 5;
            const maxSize = 10 * 1024 * 1024;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                if (dataTransferContainer.items.length >= maxFiles) {
                    alert('Atención: Solo se permite adjuntar un máximo de 5 archivos.');
                    break;
                }

                if (file.size > maxSize) {
                    alert(`El archivo "${file.name}" excede el límite máximo permitido de 10MB.`);
                    continue;
                }

                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf|\.xls|\.xlsx)$/i;
                if (!allowedExtensions.exec(file.name)) {
                    alert(`El formato del archivo "${file.name}" no es válido.`);
                    continue;
                }

                let isDuplicate = false;
                for (let j = 0; j < dataTransferContainer.files.length; j++) {
                    if (dataTransferContainer.files[j].name === file.name && dataTransferContainer.files[j].size === file.size) {
                        isDuplicate = true;
                        break;
                    }
                }

                if (!isDuplicate) {
                    dataTransferContainer.items.add(file);
                }
            }

            fileInput.files = dataTransferContainer.files;
            renderPreviews();
        }

        function renderPreviews() {
            previewContainer.innerHTML = '';

            Array.from(dataTransferContainer.files).forEach((file, index) => {
                const item = document.createElement('div');
                item.className = 'file-preview-item';

                let iconClass = 'fa-file-o';
                if (file.type.includes('image')) iconClass = 'fa-file-image-o';
                else if (file.type.includes('pdf')) iconClass = 'fa-file-pdf-o';
                else if (file.name.endsWith('.xls') || file.name.endsWith('.xlsx')) iconClass = 'fa-file-excel-o';

                item.innerHTML = `
                <div class="file-preview-name">
                    <span class="fa ${iconClass} text-cyan"></span>
                    <span>${file.name} <small class="text-muted">(${(file.size / (1024 * 1024)).toFixed(2)} MB)</small></span>
                </div>
                <button type="button" class="btn-remove-file" data-index="${index}" title="Quitar archivo">&times;</button>
            `;
                previewContainer.appendChild(item);
            });

            document.querySelectorAll('.btn-remove-file').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const indexToRemove = parseInt(this.getAttribute('data-index'));

                    const updatedContainer = new DataTransfer();
                    for (let i = 0; i < dataTransferContainer.files.length; i++) {
                        if (i !== indexToRemove) {
                            updatedContainer.items.add(dataTransferContainer.files[i]);
                        }
                    }
                    dataTransferContainer = updatedContainer;
                    fileInput.files = dataTransferContainer.files;
                    renderPreviews();
                });
            });
        }
    });
</script>
<?= $this->endSection(); ?>