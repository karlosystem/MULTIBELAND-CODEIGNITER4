<!-- footer -->
<section class="w3l-footer-29-main">
    <div class="footer-29 py-5">
        <div class="container py-lg-4">
            <div class="row footer-top-29">
                <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-1 pr-lg-5">
                    <div class="footer-logo mb-4">
                        <a class="navbar-brand" href="/">
                            <?= get_settings()->blog_title ?></a>
                    </div>
                    <p>Somos una empresa peruana dedicada a ofrecer soluciones integrales en suministro de equipos, materiales y
                        servicios especializados para el sector industrial y de maquinaria pesada. </p>
                    <div class="main-social-footer-29 mt-4">
                        <a href="<?= get_social_media()->facebook_url ?>" class="facebook"><span class="fa fa-facebook"></span></a>
                        <a href="<?= get_social_media()->youtube_url ?>" class="twitter"><span class="fa fa-youtube"></span></a>
                        <a href="<?= get_social_media()->instagram_url ?>" class="instagram"><span class="fa fa-instagram"></span></a>
                        <a href="<?= get_social_media()->whastapp_url ?>" class="linkedin"><span class="fa fa-phone"></span></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-2 mt-sm-0 mt-5">

                    <ul>
                        <h6 class="footer-title-29">Navegación</h6>
                        <li><a href="<?= base_url('nosotros') ?>">Nosotros</a></li>
                        <li><a href="<?= base_url('servicios') ?>">Servicios</a></li>
                        <li><a href="<?= base_url('galeria') ?>">Galería de Fotos</a></li>
                        <li><a href="<?= base_url('contact-us') ?>">Contáctenos</a></li>
                        <li><a href="<?= base_url('preguntas') ?>">Preguntas</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-3 mt-lg-0 mt-5">
                    <h6 class="footer-title-29">Servicios</h6>
                    <ul>
                        <?php if (function_exists('get_posts_all') && get_posts_all()): ?>
                            <?php foreach (get_posts_all() as $posts_all): ?>
                                <li><a href="<?= base_url('arequipa/' . $posts_all->slug) ?>"><?= $posts_all->title ?></a></li>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4 mt-lg-0 mt-5">
                    <h6 class="footer-title-29">Informaci&oacute;n de Cont&aacute;cto</h6>
                    <p>Dirección : <?= get_settings()->blog_address ?></p>
                    <p class="mt-2">Tel&eacute;fono : <a href="tel:<?= get_settings()->blog_phone ?>"><?= get_settings()->blog_phone ?></a></p>
                    <p class="mt-2">Email : <a href="mailto:<?= get_settings()->blog_email ?>"><?= get_settings()->blog_email ?></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright -->
    <section class="w3l-copyright text-center">
        <div class="container">
            <p class="copy-footer-29">
                <small>
                    &copy; Todos los derechos reservados <script>
                        document.write(new Date().getFullYear());
                    </script> <?= get_settings()->blog_title ?> - <a href="https://carlos-marquina.com/" target="_blank">Carlos Marquina</a>
                </small>

            </p>
        </div>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            &#10548;
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->
    </section>
    <!-- //copyright -->
</section>
<!-- //footer -->

<!--  javascripts file here -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

<script src="<?= base_url('frontend/js/jquery-1.9.1.min.js') ?>"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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
</body>

</html>