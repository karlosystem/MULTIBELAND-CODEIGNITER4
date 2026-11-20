<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('content'); ?>

<div class="w3l-servicesblock1" id="why">
    <section id="grids5-block" class="py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <h3 class="title-big mw-100">Nuestros Servicios</h3>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-md-4 mt-3">
                    <p>Cada cliente tiene sus propios retos y en <b>Multi Beland S.A.C.</b> lo sabemos bien. <br> Por
                        eso nos tomamos el tiempo en entender lo que realmente necesitas y te damos soluciones que
                        sumen, no que compliquen. Desde tapiceria hasta estandarización, trabajamos con seriedad,
                        eficiencia y ese compromiso firme de dejar todo bien hecho, como debe ser. </p>
                </div>

            </div>
            <div class="row mt-md-5 mt-4 text-center">
                <?php foreach(get_posts_all() as $posts_all): ?>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                    <div class="grids5-info">
                        <a href="<?= route_to('read-post', $posts_all->slug) ?>" class="d-block">
                            <img src="images/posts/<?= $posts_all->featured_image ?>"
                                class="img-fluid service-image" />
                        </a>
                        <div class="blog-info">
                            <h4><a href="<?= route_to('read-post', $posts_all->slug) ?>"><?= $posts_all->title ?></a></h4>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>


        </div>
    </section>
</div>

<?= $this->endSection(); ?>