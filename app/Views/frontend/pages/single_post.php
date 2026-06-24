<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('page_meta'); ?>
<meta name="description" content="<?= $post->meta_description ?>" />
<meta name="keywords" content="<?= $post->meta_keywords ?>" />
<link rel="canonical" href="<?= current_url() ?>" />
<meta itemprop="name" content="<?= $post->title ?>" />
<meta itemprop="description" content="<?= $post->meta_description ?>" />
<meta itemprop="image" content="<?= base_url('images/posts/' . $post->featured_image) ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?= $post->title ?>" />
<meta property="og:description" content="<?= $post->meta_description ?>" />
<meta property="og:image" content="<?= base_url('images/posts/' . $post->featured_image) ?>" />
<meta property="og:url" content="<?= current_url() ?>" />
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="w3l-text-6 py-2" id="about">
    <div class="text-6-mian py-lg-2 py-md-4">
        <div class="container">
            <div class="row top-cont-grid align-items-center">
                <div class="col-lg-6 left-img pr-lg-4">
                    <img src="<?= base_url('images/posts/' . $post->featured_image) ?>" class="img-responsive radius-image img-fluid" alt="<?= $post->title ?>" />
                </div>
                <div class="col-lg-6 text-6-info mt-lg-0 mt-md-5 mt-4">
                    <h3 class="title-big mw-100"><strong><?= $post->title ?></strong></h3>
                    <?= $post->content; ?>
                </div>
            </div>
            <?= $post->leyenda; ?>
            <a href="<?= route_to('contact-us') ?>" class="btn btn-style1 btn-primary mt-sm-5 mt-4">Contáctenos</a>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="hero featured-carousel owl-carousel">
                    
                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url('<?= base_url('frontend/images/1.png') ?>');">
                                <div class="text w-100">
                                    <span class="cat">FUNDA CILINDRO DE BOOM EXCAVADORA</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url('<?= base_url('frontend/images/2.png') ?>');">
                                <div class="text w-100">
                                    <span class="cat">FUNDA CILINDRO RIPPER D8</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url('<?= base_url('frontend/images/3.png') ?>');">
                                <div class="text w-100">
                                    <span class="cat">FUNDA PARA CLINDRO DE INCLINACION D8T</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url('<?= base_url('frontend/images/4.png') ?>');">
                                <div class="text w-100">
                                    <span class="cat">FUNDAS PARA CILINDROS DE LEVANTE BUCKET</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="work">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url('<?= base_url('frontend/images/5.png') ?>');">
                                <div class="text w-100">
                                    <span class="cat">FUNDAS PARA CILINDROS DE LEVANTE BULLDOSER</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>