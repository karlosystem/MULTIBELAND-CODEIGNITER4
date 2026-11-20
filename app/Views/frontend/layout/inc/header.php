<header id="site-header" class="fixed-top header-redesign-style">
    <section class="w3l-header-4">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <h1>
                    <a class="navbar-brand" href="<?= base_url('/') ?>">
                        <img alt="<?= get_settings()->blog_title ?>" src="<?= base_url('images/blog/' . get_settings()->blog_logo) ?>" class="d-inline-block align-middle logo-responsive">
                    </a>
                </h1>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav mx-auto">
                        <?php
                        $current_url = current_url();
                        $uri = uri_string();
                        ?>

                        <!-- Inicio -->
                        <li class="nav-item <?= ($uri == '' || $uri == 'inicio') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('/') ?>">Inicio</a>
                        </li>

                        <!-- Nosotros -->
                        <li class="nav-item <?= ($uri == 'nosotros') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('nosotros') ?>">Nosotros</a>
                        </li>

                       <!-- Servicios (Dropdown) -->
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Servicios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= base_url('pintura-industrial') ?>">
                                    Pintura Industrial                                      
                                </a>

                                <a class="dropdown-item" href="<?= base_url('tapiceria-industrial') ?>">
                                    Tapiceria Industrial y Protección Operativa                                 
                                </a>

                                <a class="dropdown-item" href="<?= base_url('soldadura-industrial') ?>">
                                    Soldadura Industrial                                 
                                </a>

                                <a class="dropdown-item" href="<?= base_url('vidrieria-industrial') ?>">
                                    Vidrieria Industrial                                 
                                </a>

                                <a class="dropdown-item" href="<?= base_url('restauracion-cabinas') ?>">
                                    Restauración de Cabinas
                                </a>

                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item "
                                    href="#">Todos</a>
                            </div>
                        </li>


                        <!-- Cobertura -->
                        <li class="nav-item <?= ($uri == 'cobertura') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('cobertura') ?>">Cobertura</a>
                        </li>

                        <!-- Blog -->
                        <li class="nav-item <?= ($uri == 'blog') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('blog') ?>">Blog</a>
                        </li>

                        <!-- Contacto -->
                        <li class="nav-item <?= ($uri == 'contact-us') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('contact-us') ?>">Contacto</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav search-right mt-lg-0 mt-2">
                        <li class="nav-item mr-2" title="Search"><a href="#search" class="btn search-search"><span class="fa fa-search" aria-hidden="true"></span></a></li>
                        <li class="nav-item">
                            <a href="<?= base_url('contact-us') ?>" class="btn btn-cotizar d-none d-lg-block px-4">Cotizar Servicio</a>
                        </li>
                    </ul>

                    <div id="search" class="pop-overlay">
                        <div class="popup">
                            <form action="#" method="GET" class="d-flex">
                                <input type="search" placeholder="Buscar.." name="search" required="required" autofocus>
                                <button type="submit"><span class="fa fa-search"></span></button>
                                <a class="close" href="#close">&times;</a>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>
</header>