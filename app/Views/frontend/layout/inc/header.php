    <!-- top header -->
    <section class="w3l-top-header">
        <div class="container">
            <div class="top-header-2">
                <div class="d-grid main-top">
                    <div class="top-headers">
                        <ul class="left-info">
                            <li>
                                <span class="fa fa-phone"></span><a href="tel:<?= get_settings()->blog_phone ?>"><?= get_settings()->blog_phone ?></a>
                            </li>
                            <li class="">
                                <a href="<?= base_url('contact-us') ?>" class="d-md-block d-none">Contáctenos</a>
                            </li>
                            <li class="">
                                <a href="mailto:<?= get_settings()->blog_email ?>"
                                    class="d-md-block d-none"><?= get_settings()->blog_email ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="top-headers">
                        <ul>
                            <li>
                                <a target="_blank" href="<?= get_social_media()->facebook_url ?>"><span class="fa fa-facebook"></span></a>
                            </li>
                            <li>
                                <a target="_blank" href="<?= get_social_media()->youtube_url ?>"><span class="fa fa-youtube"></span></a>
                            </li>
                            <li>
                                <a target="_blank" href="<?= get_social_media()->instagram_url ?>"><span class="fa fa-instagram"></span></a>
                            </li>
                            <li class="mr-0">
                                <a target="_blank" href="<?= get_social_media()->whastapp_url ?>"><span class="fa fa-phone"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //top header -->
    <header id="site-header" class="fixed-top">
        <section class="w3l-header-4">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                   <h1>
                        <a class="navbar-brand" href="<?= base_url('/') ?>">
                            <img alt="<?= get_settings()->blog_title ?>" src="<?= base_url('images/blog/' . get_settings()->blog_logo) ?>" class="d-inline-block align-middle">
                        </a>
                    </h1>

                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="fa icon-expand fa-bars"></span>
                        <span class="fa icon-close fa-times"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">


                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= base_url('/') ?>">Inicio </a>
                            </li>
                            <li class="nav-item @@about__active">
                                <a class="nav-link" href="<?= base_url('nosotros') ?>">Nosotros</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Servicios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">                        

                                    <?php if (function_exists('get_posts_all') && get_posts_all()): ?>
                                    <?php foreach (get_posts_all() as $posts_all): ?>
                                        <a class="dropdown-item" href="<?= base_url('arequipa/' . $posts_all->slug) ?>"><?= $posts_all->title ?></a>
                                    <?php endforeach ?>
                                <?php endif; ?>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('servicios') ?>">Todos</a>
                                </div>
                            </li>
                            <li class="nav-item @@services__active">
                                <a class="nav-link" href="<?= base_url('galeria') ?>">Galeria</a>
                            </li>
                            <li class="nav-item @@services__active">
                                <a class="nav-link" href="<?= base_url('clientes') ?>">Clientes</a>
                            </li>
                            <li class="nav-item @@contact__active">
                                <a class="nav-link" href="<?= base_url('contact-us') ?>">Contáctenos</a>
                            </li>
                        </ul>



                        <ul class="navbar-nav search-right mt-lg-0 mt-2">
                            <li class="nav-item mr-2" title="Search"><a href="#search" class="btn search-search">
                                    <span class="fa fa-search" aria-hidden="true"></span></a></li>
                            <li class="nav-item"><a target="_blank" href="https://wa.me/51949766420?text=¡Hola!"
                                    class="btn btn-success d-none d-lg-block btn-style1 mr-3">Whastapp</a></li>
                        </ul>

                        <div id="search" class="pop-overlay">
                            <div class="popup">
                                <form action="#" method="GET" class="d-flex">
                                    <input type="search" placeholder="Buscar.." name="search" required="required"
                                        autofocus>
                                    <button type="submit"><span class="fa fa-search"></span></button>
                                    <a class="close" href="#close">&times;</a>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="mobile-position">
                        <nav class="navigation">
                            <div class="theme-switch-wrapper">
                                <label class="theme-switch" for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    <div class="mode-container">
                                        <i class="gg-sun"></i>
                                        <i class="gg-moon"></i>
                                    </div>
                                </label>
                            </div>
                        </nav>
                    </div>
                </nav>
            </div>
        </section>
    </header>