<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('page_meta'); ?>
<meta name="robots" content="index, follow">
<meta name="title" content="<?= get_settings()->blog_title ?>">
<meta name="description" content="<?= get_settings()->blog_meta_description ?>">
<meta name="keywords" content="<?= get_settings()->blog_meta_keywords ?>">
<link rel="canonical" href="<?= base_url() ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- main-slider -->
<section class="w3l-main-slider" id="home">
    <div class="companies20-content">
        <div class="owl-one owl-carousel owl-theme">
            <?php foreach(get_banners_all() as $banners_all): ?>
            <div class="item">
                <li>
                    <div class="slider-info banner-view banner-top bg bg2" style="background-image: url(images/banners/<?= $banners_all->image ?>);">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <p>LA DIFERENCIA MULTI BELAND S.A.C.</p>
                                    <h5><?= $banners_all->name ?></h5>
                                    <p class="mt-md-4 mt-3"><?= $banners_all->description ?></p>
                                    <a href="<?= route_to('contact-us') ?>" class="btn btn-outline-primary btn-style1 mt-md-5 mt-4"> Contáctenos</a>
                                    <a class="btn btn-style1 btn-primary mt-sm-5 mt-4 mr-2" href="<?= $banners_all->link ?>"> Ver Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- /main-slider -->

<!-- about page about section -->
<section class="w3l-aboutblock1" id="about">
    <div class="midd-w3 py-2">
        <div class="container py-lg-5 py-md-3 py-2">
            <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-md-5 mb-5 align-self">
                    <h3 class="title-big mx-0">&iquest; QUIÉNES SOMOS ? </h3>

                    <p class="mt-md-4 mt-3">
                        En <strong>MULTI BELAND</strong> somos una empresa especializada en la comercialización y distribución de materiales. Estamos comprometidos a acompañarte en cada paso, aportando valor real a tus proyectos y ayudándote a alcanzar tus objetivos con soluciones efectivas y personalizadas. Puedes contactarnos para descubrir cómo podemos contribuir al crecimiento de tu negocio. Nuestro equipo de atención estará encantado de resolver tus dudas, ofrecerte información detallada y ayudarte a tomar la mejor decisión según tus necesidades.</p>

                    <a href="archivos/catalogo.pdf" target="_new" class="btn btn-primary btn-style1 mt-md-5 mt-4 mr-2">Descargar Brochure</a>
                    <a href="contactenos.php" class="btn btn-outline-primary btn-style1 mt-md-5 mt-4"> Ver Más</a>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                       <img src="<?= base_url('frontend/images/quienes-somos.png') ?>" class="radius-image img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //about page about section -->

<!--  services section -->
<div class="w3l-servicesblock2" id="services">
    <section id="grids5-block" class="py-2">
        <div class="container py-lg-2 py-md-4 py-2">
            <h3 class="title-big text-center">Algunos de nuestros servicios</h3>
            <div class="row mt-lg-5 mt-4">
                <?php foreach(get_4_home_latest_posts() as $posts_4): ?>
                <div class="col-lg-3 col-md-6 mt-md-0 mt-5">
                    <div class="grids5-info">
                        <a href="<?= route_to('read-post', $posts_4->slug) ?>" class="d-block zoom"><img src="images/posts/<?= $posts_4->featured_image ?>"
                                class="img-fluid service-image" /></a>
                        <div class="blog-info">
                            <span class="fa fa-desktop"></span>
                            <h4><a href="<?= route_to('read-post', $posts_4->slug) ?>"><?= $posts_4->title ?></a></h4>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>             
            </div>
        </div>
    </section>
</div>
<!--  //services section -->

<section class="w3l-products w3l-faq-block py-5" id="projects">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="row ">
            <div class="col-lg-6 mx-auto">
                <h3 class="title-big mb-md-5 mb-4 mw-100">¿Necesita un mejor trabajo? Llegamos con 5 años de experiencia</h3>
                <!--Horizontal Tab-->
                <div id="parentHorizontalTab">
                    <ul class="resp-tabs-list hor_1 mb-2">
                        <li>Acerca de</li>
                        <li>Nuestra Misi&oacute;n</li>
                        <li>Nuestra Visi&oacute;n</li>
                        <div class="clear"></div>
                    </ul>
                    <div class="resp-tabs-container hor_1">
                        <div class="products-content">
                            <h4 class="head">Somos una empresa dedicada a ofrecer soluciones integrales en suministro de equipos, materiales y servicios especializados para el sector industrial y de maquinaria pesada. Nos enfocamos en proporcionar productos de alta calidad y servicios personalizados que optimizan las operaciones de nuestros clientes, garantizando eficiencia, seguridad y durabilidad en cada proyecto.</p>
                                <ul class="w3l-right-book mt-4">
                                    <li><span class="fa fa-check" aria-hidden="true"></span>Multi Beland S.A.C.</li>
                                </ul>
                        </div>
                        <div class="products-content">
                            <h4 class="head">Brindar soluciones integrales, r&aacute;pidas y eficaces para peque&ntilde;as y grandes empresas del rubro minero e industrial. Nos adaptamos a tus necesidades especificas, optimizamos tiempos, mejoramos procesos y resolvemos con agilidad con servicios como pintura, tapiceria, vidrieria, estandarizacion y abastecimiento.</p>
                                <ul class="w3l-right-book mt-4">
                                    <li><span class="fa fa-check" aria-hidden="true"></span>Helping Nonprofit organizations</li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span>Leading private equity firms</li>
                                </ul>
                        </div>
                        <div class="products-content">
                            <h4 class="head">Ser una empresa multiservicios reconocida a nivel nacional por nuestra capacidad de respuesta, compromiso y dinamismo. En los proximos años queremos ampliar nuestra presencia en el mercado y consolidar un equipo solido y especializado.</p>
                                <ul class="w3l-right-book mt-4">
                                    <li><span class="fa fa-check" aria-hidden="true"></span>Always Fast and friendly support</li>
                                    <li><span class="fa fa-check" aria-hidden="true"></span>Experienced Professional Team</li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pr-lg-5 mt-lg-0 mt-sm-5 mt-4">
               <img src="<?= base_url('frontend/images/portada.jpg') ?>" alt="Portada Multi Beland"
     class="img-fluid radius-image" />
                <!-- <div class="accordion">
                    <div class="accordion-item">
                        <button id="accordion-button-1" aria-expanded="true"><span class="accordion-title">How much does
                                a static website cost?</span><span class="icon" aria-hidden="true"></span></button>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis
                                ut. Ut tortor.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">How to
                                choose a best web template?</span><span class="icon" aria-hidden="true"></span></button>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis
                                ut. Ut pretium.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">How to download a template?</span><span class="icon" aria-hidden="true"></span></button>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis
                                ut. Ut tortor.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">Why should i choose a free website?</span><span class="icon" aria-hidden="true"></span></button>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis
                                ut. Ut potenti.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">Why should i choose a free website?</span><span class="icon" aria-hidden="true"></span></button>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis
                                ut. Ut potenti.</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<div class="w3l-servicesblock2" id="process">
    <section id="grids5-block" class="py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <h3 class="title-big text-center">SOMOS EXPERTOS EN : </h3>
            <div class="row mt-lg-5 mt-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="grids5-info">
                        <a href="estandarizacion.php" class="blog-image d-block zoom"><img src="<?= base_url('frontend/images/p1.jpg') ?>" alt="Proyecto 1"
     class="img-fluid radius-image" />
                            <div class="image-overlay">
                                <h4>Estandarizaci&oacute;n</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, consectetur.</p>
                            </div>
                            <div class="iconic-plus">
                                <span class="fa fa-plus"></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-md-0 mt-4">
                    <div class="grids5-info">
                        <a href="soldadura.php" class="blog-image d-block zoom"><img src="<?= base_url('frontend/images/p2.jpg') ?>" alt="Proyecto 2"
                                class="img-fluid radius-image" />
                            <div class="image-overlay">
                                <h4>Soldadura</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, consectetur.</p>
                            </div>
                            <div class="iconic-plus">
                                <span class="fa fa-plus"></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                    <div class="grids5-info">
                        <a href="vidrieria.php" class="blog-image d-block zoom"><img src="<?= base_url('frontend/images/p3.jpg') ?>" alt="Proyecto 3"
                                class="img-fluid radius-image" />
                            <div class="image-overlay">
                                <h4>Vidrieria y Laminados</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, consectetur.</p>
                            </div>
                            <div class="iconic-plus">
                                <span class="fa fa-plus"></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                    <div class="grids5-info">
                        <a href="traslados" class="blog-image d-block zoom"><img src="<?= base_url('frontend/images/p4.jpg') ?>" alt="Proyecto 4"
                                class="img-fluid radius-image" />
                            <div class="image-overlay">
                                <h4>Traslados</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, consectetur.</p>
                            </div>
                            <div class="iconic-plus">
                                <span class="fa fa-plus"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="w3l-bottom1 py-2">
    <div class="container py-md-5 py-sm-4 py-2">
        <div class="row">
            <div class="col-lg-7">
                <div class="bottom-info">
                    <div class="header-section">
                        <h3 class="title-big mx-0">Multi Beland S.A.C.</h3>
                        <p class="mt-3 pr-lg-5">Nuestro objetivo es brindarles servicios con calidad, garantica y confiabilidad cumpliendo con un exigente servicio y la satisfacción plena de las necesidades de nuestros clientes..</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 align-self text-lg-right">
                <a href="contactenos.php" class="btn btn-style btn-outline-dark mt-lg-0 mt-md-5 mt-4 mr-2">Ver M&aacute;s </a>
                <a href="contactenos.php" class="btn btn-style btn-primary mt-lg-0 mt-md-5 mt-4">Cont&aacute;ctenos</a>
            </div>
        </div>
</section>

<section class="w3l-customers py-md-5 py-2" id="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-three owl-carousel owl-theme logo-view">
                    <div class="item">
                        <img src="<?= base_url('frontend/images/logo-01.png') ?>" alt="company-logo" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="<?= base_url('frontend/images/logo-02.png') ?>" alt="company-logo" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="<?= base_url('frontend/images/logo-03.png') ?>" alt="company-logo" class="img-fluid">
                    </div>                
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>