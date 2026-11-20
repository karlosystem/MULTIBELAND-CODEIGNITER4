<?= $this->extend('frontend/layout/pages-layout'); ?>

<?= $this->section('content'); ?>

<div class="w3l-servicesblock1" id="why">
    <section id="grids5-block" class="py-5">
        <div class="container py-lg-5 py-md-4">

            <div class="row align-items-center">
                <div class="col-lg-4">
                    <h3 class="title-big mw-100">Nuestros Clientes</h3>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-md-4 mt-3">
                    <p>Cada cliente tiene sus propios retos y en <b>Multi Beland S.A.C.</b> lo sabemos bien. <br> Por
                        eso nos tomamos el tiempo en entender lo que realmente necesitas y te damos soluciones que
                        sumen, no que compliquen. Desde tapiceria hasta estandarización, trabajamos con seriedad,
                        eficiencia y ese compromiso firme de dejar todo bien hecho, como debe ser. </p>
                </div>
            </div>

            <div class="row py-5">
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a title="title anchor 01" href="frontend/images/ferreyros.jpg"
                        class="fancybox" rel="ligthbox">
                        <img src="frontend/images/ferreyros.jpg"
                            class="zoom img-fluid " alt="insert alt txt here" data-caption="Description-1">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a title="title anchor 01" href="frontend/images/rentafer.jpg"
                        class="fancybox" rel="ligthbox">
                        <img src="frontend/images/rentafer.jpg"
                            class="zoom img-fluid" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a title="title anchor 01" href="frontend/images/atlas.jpg"
                        class="fancybox" rel="ligthbox">
                        <img src="frontend/images/atlas.jpg"
                            class="zoom img-fluid " alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>