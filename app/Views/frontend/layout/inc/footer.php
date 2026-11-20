<section class="w3l-footer-29-main custom-modern-footer">
    <div class="footer-29 py-2">
        <div class="container py-lg-0">
            <div class="row footer-top-29">
                <div class="col-lg-3 col-md-6 footer-list-29 footer-1 pr-lg-4 mb-lg-0 mb-4">
                    <div class="footer-logo-container mb-3">
                        <a class="navbar-brand" href="<?= base_url('/') ?>">
                            <img src="<?= base_url('frontend/images/logo-footer.png') ?>" class="footer-logo-large">
                        </a>
                    </div>
                    <p class="footer-text-description">Somos una empresa peruana dedicada a ofrecer soluciones integrales en suministro de equipos, materiales y servicios especializados para el sector industrial y de maquinaria pesada.</p>
                </div>
                <div class="col-lg-3 col-md-6 footer-list-29 footer-2 mb-lg-0 mb-4 pl-lg-4">
                    <h6 class="footer-title-modern">Enlaces Rápidos</h6>
                    <ul class="footer-links-list">
                        <li><a href="<?= base_url('/') ?>">Inicio</a></li>
                        <li><a href="<?= base_url('nosotros') ?>">Nosotros</a></li>
                        <li><a href="<?= base_url('blog') ?>">Nuestro Blog</a></li>
                        <li><a href="<?= base_url('contact-us') ?>">Contáctenos</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-list-29 footer-3 mb-lg-0 mb-4">
                    <h6 class="footer-title-modern">Servicios</h6>
                    <ul class="footer-links-list">
                        <li><a href="<?= base_url('pintura-industrial') ?>">Pintura Industrial</a></li>
                        <li><a href="<?= base_url('tapiceria-industrial') ?>">Tapiceria Industrial</a></li>
                        <li><a href="<?= base_url('soldadura-industrial') ?>">Soldadura Industrial</a></li>
                        <li><a href="<?= base_url('vidrieria-industrial') ?>">Vidrieria Industrial</a></li>
                        <li><a href="<?= base_url('restauracion-cabinas') ?>">Restauración de Cabinas</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-list-29 footer-4">
                    <h6 class="footer-title-modern">Conecta con Nosotros</h6>
                    <ul class="footer-contact-info">
                        <li>
                            <span class="fa fa-phone icon-cyan-footer"></span>
                            <a href="tel:<?= get_settings()->blog_phone ?>"><?= get_settings()->blog_phone ?></a>
                        </li>
                        <li>
                            <span class="fa fa-envelope icon-cyan-footer"></span>
                            <a href="mailto:<?= get_settings()->blog_email ?>"><?= get_settings()->blog_email ?></a>
                        </li>
                        <li>
                            <span class="fa fa-map-marker icon-cyan-footer"></span>
                            <span class="text-white-info">Lima, Perú</span>
                        </li>
                    </ul>
                    <div class="footer-social-minimal mt-4">
                        <a href="<?= get_social_media()->facebook_url ?>" target="_blank" class="facebook"><span class="fa fa-facebook"></span></a>
                        <a href="<?= get_social_media()->youtube_url ?>" target="_blank" class="youtube"><span class="fa fa-youtube"></span></a>
                        <a href="<?= get_social_media()->instagram_url ?>" target="_blank" class="instagram"><span class="fa fa-instagram"></span></a>
                        <a href="<?= get_social_media()->whastapp_url ?>" target="_blank" class="whatsapp"><span class="fa fa-phone"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="w3l-copyright text-center py-4">
        <div class="container">
            <p class="copy-footer-29">© <?= date('Y') ?> <?= get_settings()->blog_title ?>. Todos los derechos reservados.</p>
        </div>
    </section>
</section>

<!--  javascripts file here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

<script>
    $(document).ready(function(jQuery) {
        jQuery(".fancybox").fancybox({
            helpers: {
                title: {
                    type: 'inside'
                }
            },
            afterLoad: function() {
                this.title = this.title + ' ' + jQuery(this.element).find('img').attr('alt');
            },
            openEffect: "none",
            closeEffect: "none"
        });

        jQuery(".zoom").hover(function() {
            jQuery(this).addClass('transition');
        }, function() {
            jQuery(this).removeClass('transition');
        });
    });
</script>

<script src="<?= base_url('frontend/js/theme-change.js') ?>"></script>

<!-- faq -->
<script>
    const items = document.querySelectorAll(".accordion button");

    function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');

        for (i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
        }

        if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
        }
    }

    items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
<!-- //faq -->

<script src="<?= base_url('frontend/js/easyResponsiveTabs.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>

<!-- owl carousel -->
<script src="<?= base_url('frontend/js/owl.carousel.js') ?>"></script>
<!-- script for banner slider-->
<script>
    $(document).ready(function() {
        $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                667: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    })
</script>
<!-- //script -->
<!-- owl carousel -->

<!-- script for customers -->
<script>
    $(document).ready(function() {
        $('.owl-three').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 3,
                    nav: true
                },
                480: {
                    items: 3,
                    nav: true
                },
                667: {
                    items: 3,
                    nav: true
                },
                800: {
                    items: 4,
                    nav: true
                },
                1000: {
                    items: 5,
                    nav: true
                }
            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('.featured-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 30,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 15000,
            nav: true,
            dots: true,
            autoplayHoverPause: false,
            items: 1,
            navText: ["<span style='font-size: 48px;' class='ion-ios-arrow-back'></span>", "<span style='font-size: 48px;' class='ion-ios-arrow-forward'></span>"],
        });

        $('#owl-brands').owlCarousel({
            loop: true, // Bucle infinito
            margin: 35, // Espacio de separación entre logos
            autoplay: true, // Movimiento automático
            autoplayTimeout: 2500, // Tiempo de espera entre transiciones (2.5s)
            autoplaySpeed: 900, // Velocidad de la animación de deslizamiento
            autoplayHoverPause: true, // Se pausa si el usuario pone el mouse encima
            nav: false, // Oculta las flechas de navegación
            dots: false, // Oculta los puntos de paginación
            responsive: {
                0: {
                    items: 2 // 2 logos en pantallas muy pequeñas
                },
                480: {
                    items: 3 // 3 logos en celulares medianos
                },
                768: {
                    items: 4 // 4 logos en tablets
                },
                992: {
                    items: 5 // 5 logos en laptops
                },
                1200: {
                    items: 7 // Muestra los 7 logos juntos en pantallas grandes
                }
            }
        });

    });
</script>
<!-- //customers owlcarousel -->

<!-- disable body scroll which navbar is in active -->
<!-- <script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script> -->
<!-- disable body scroll which navbar is in active -->

<!--/MENU-JS-->
<script>
    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function() {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function() {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });

    $('.dropdown').click(function() {
        $('.dropdown-menu').toggleClass('show');
    });
</script>
<script src="<?= base_url('frontend/js/bootstrap.min.js') ?>"></script>

<?= $this->renderSection('scripts'); ?>

<!-- Botón Flotante de WhatsApp Global -->
<a href="https://wa.me/51949766420?text=Hola,%20equipo%20de%20Multi%20Beland.%20Un%20gusto%20saludarlos.%20He%20estado%20revisando%20su%20sitio%20web%20y%20me%20interesa%20recibir%20informaci%C3%B3n%20detallada%20sobre%20su%20servicio%20de%20[Nombre%20del%20Servicio],%20as%C3%AD%20como%20las%20opciones%20de%20cotizaci%C3%B3n%20disponibles.%20Quedo%20atento%20a%20su%20respuesta.%20¡Muchas%20gracias!" 
   class="whatsapp-float-btn" 
   target="_blank" 
   rel="noopener noreferrer" 
   title="Escríbenos por WhatsApp">
    <i class="fab fa-whatsapp whatsapp-float-icon"></i>
</a>

</body>

</html>