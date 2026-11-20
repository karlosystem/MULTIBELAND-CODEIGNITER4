<?php
/**
 * Partial: Carrusel de Clientes
 * Muestra las empresas que ya confiaron en Multi Beland
 * 
 * Uso: <?= $this->include('frontend/partials/clientes-carousel') ?>
 */
?>
<section class="py-4 border-top border-bottom bg-light clientes-carousel-section">
    <div class="container">
        <p class="text-center text-cyan font-weight-bold mb-4" style="font-size: 1.3rem;">
            Empresas que ya confiaron en nosotros
        </p>
        <div class="owl-three owl-carousel owl-theme logo-view">
            <div class="item text-center">
                <img src="<?= base_url('frontend/images/logo-01.png') ?>" 
                     alt="Ferreyros" 
                     class="img-fluid mx-auto">
            </div>
            <div class="item text-center">
                <img src="<?= base_url('frontend/images/logo-02.png') ?>" 
                     alt="Rentafer" 
                     class="img-fluid mx-auto">
            </div>
            <div class="item text-center">
                <img src="<?= base_url('frontend/images/logo-03.png') ?>" 
                     alt="Atlas Copco" 
                     class="img-fluid mx-auto">
            </div>
            <div class="item text-center">
                <img src="<?= base_url('frontend/images/logo-04.png') ?>" 
                     alt="APM Terminals" 
                     class="img-fluid mx-auto">
            </div>
            <div class="item text-center">
                <img src="<?= base_url('frontend/images/logo-05.png') ?>" 
                     alt="AUTRISA" 
                     class="img-fluid mx-auto">
            </div>
        </div>
    </div>
</section>