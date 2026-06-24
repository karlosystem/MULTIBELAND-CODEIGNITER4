<?= $this->extend('backend/layout/pages-layout') ?>

<?= $this->section("content") ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Configuración</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= route_to('admin.home'); ?>">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Configuración
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-4">
    <div class="tab">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-blue" data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">Configuracion General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-blue" data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo y Favicon</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-blue" data-toggle="tab" href="#social_media" role="tab" aria-selected="false">Social Media</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="general_settings" role="tabpanel">
                <div class="pd-20">
                    <form method="POST" id="general_settings_form" action="<?= route_to('update-general-settings'); ?>">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Titulo de La Pagina Web</label>
                                    <input value="<?= get_settings()->blog_title; ?>" type="text" class="form-control" name="blog_title" placeholder="Ingrese el nombre de la Pagina Web">
                                    <span class="text-danger error-text blog_title_error"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email de La Pagina Web</label>
                                    <input value="<?= get_settings()->blog_email; ?>" type="email" class="form-control" name="blog_email" placeholder="Ingrese el email de la Pagina Web">
                                    <span class="text-danger error-text blog_email_error"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input value="<?= get_settings()->blog_address; ?>" type="text" class="form-control" name="blog_address" placeholder="Ingrese la dirección">
                                    <span class="text-danger error-text blog_address_error"></span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Numero de Telefono</label>
                                    <input value="<?= get_settings()->blog_phone; ?>" type="text" class="form-control" name="blog_phone" placeholder="Ingrese el nombre el numero de telefono">
                                    <span class="text-danger error-text blog_phone_error"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">MetaKeywords de La Pagina Web</label>
                                    <input value="<?= get_settings()->blog_meta_keywords; ?>" type="text" class="form-control" name="blog_meta_keywords" placeholder="Ingrese el MetaKeywords de la Pagina Web">
                                    <span class="text-danger error-text blog_meta_keywords_error"></span>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea name="blog_meta_description" class="form-control" id="" cols="4" rows="3" placeholder="Ingrese el meta description"><?= get_settings()->blog_meta_description; ?></textarea>
                                    <span class="text-danger error-text blog_meta_description_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="logo_favicon" role="tabpanel">
                <div class="pd-20">
                    <div class="col-md-6">
                        <h5>Actualizar LogoTipo de La Empresa</h5>
                        <div class="mb2 mt-1" style="max-width: 200px;">
                            <img src="" alt="" class="img-thumbnail" id="logo-image-preview" data-ijabo-default-img="/images/blog/<?= get_settings()->blog_logo ?>">
                        </div>
                        <form action="<?= route_to('update-blog-logo') ?>" method="post" enctype="multipart/form-data" id="changeBlogLogoForm">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                            <div class="mb-2">
                                <input type="file" name="blog_logo" class="form-control">
                                <span class="text-danger error-text"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Logo</button>

                        </form>
                    </div>

                    <div class="col-md-6 ">
                        <h5 class="mt-3">Cambiar Favicon de La Pagina Web</h5>
                        <div class="mb2 mt-1" style="max-width: 200px;">
                            <img src="" alt="" class="img-thumbnail" id="favicon-image-preview">
                        </div>
                        <form action="<?= route_to('update-blog-favicon') ?>" method="post" enctype="multipart/form-data" id="changeBlogFaviconForm">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                            <div class="mb-2">
                                <input type="file" name="blog_favicon" class="form-control">
                                <span class="text-danger error-text"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Favicon</button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="social_media" role="tabpanel">
                <div class="pd-20">
                    <form method="post" id="social_media_form" action="<?= route_to('update-social-media') ?>">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">URL de Facebook</label>
                                    <input type="text" class="form-control" name="facebook_url" value="<?= get_social_media()->facebook_url ?>" placeholder="Ingrese la direccion de Facebook">
                                    <span class="text-danger error-text facebook_url_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">URL de Instagram</label>
                                    <input type="text" class="form-control" name="instagram_url" value="<?= get_social_media()->instagram_url ?>" placeholder="Ingrese la direccion de Instagram">
                                    <span class="text-danger error-text instagram_url_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">URL de TIKTOK</label>
                                    <input type="text" class="form-control" value="<?= get_social_media()->tiktok_url ?>" name="tiktok_url" placeholder="Ingrese la direccion de TIKTOK">
                                    <span class="text-danger error-text tiktok_url_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">URL de YouTube</label>
                                    <input type="text" class="form-control" value="<?= get_social_media()->youtube_url ?>" name="youtube_url" placeholder="Ingrese la direccion de YouTube">
                                    <span class="text-danger error-text youtube_url_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">URL de Whastapp</label>
                                    <input type="text" class="form-control" value="<?= get_social_media()->whastapp_url ?>" name="whastapp_url" placeholder="Ingrese la direccion de Whastapp">
                                    <span class="text-danger error-text whastapp_url_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">URL de Telegram</label>
                                    <input type="text" class="form-control" value="<?= get_social_media()->telegram_url ?>" name="telegram_url" placeholder="Ingrese la direccion de Telegram">
                                    <span class="text-danger error-text telegram_url_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?= $this->endSection() ?>

    <?= $this->section('scripts') ?>
    <script>
        $('#general_settings_form').on('submit', function(e) {
            e.preventDefault();
            var csrfName = $('.ci_csrf_data').attr('name');
            var csrfHash = $('.ci_csrf_data').val;
            var form = this;
            var formdata = new FormData(form);
            formdata.append(csrfName, csrfHash);

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formdata,
                processData: false,
                dataType: 'json',
                contentType: false,
                cache: false,
                beforeSend: function() {
                    toastr.remove();
                    $(form).find('span.error.text').text('');
                },
                success: function(response) {
                    //actualizar CSRF Hash
                    $('.ci_csrf_data').val(response.token);
                    if ($.isEmptyObject(response.error)) {
                        if (response.status == 1) {
                            //$(form)[0].reset();
                            toastr.success(response.msg);
                        } else {
                            toastr.error(response.msg);
                        }
                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });

        });

        $('#changeBlogLogoForm').on('submit', function(e) {
            e.preventDefault();
            var csrfName = $('.ci_csrf_data').attr('name');
            var csrfHash = $('.ci_csrf_data').val();
            var form = this;
            var formdata = new FormData(form);
            formdata.append(csrfName, csrfHash);
            var inputFileVal = $(form).find('input[type="file"][name="blog_logo"]').val();
            if (inputFileVal.length > 0) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: formdata,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        toastr.remove();
                        $(form).find('span.error-text').text('');
                    },
                    success: function(response) {
                        $('.ci_csrf_data').val(response.token);
                        if ($.isEmptyObject(response.error)) {
                            if (response.status == 1) {
                                $(form)[0].reset();
                                toastr.success(response.msg);
                            } else {
                                toastr.error(response.msg);
                            }
                        } else {
                            $.each(response.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val);
                            });
                        }
                    }

                });
            } else {
                $(form).find('span.error-text').text('Por favor seleccione el logo de la empresa, recomendado es PNG');
            }
        });

        $('#changeBlogFaviconForm').on('submit', function(e) {
            e.preventDefault();
            var csrfName = $('.ci_csrf_data').attr('name');
            var csrfHash = $('.ci_csrf_data').val();
            var form = this;
            var formdata = new FormData(form);
            formdata.append(csrfName, csrfHash);
            var inputFileVal = $(form).find('input[type="file"][name="blog_favicon"]').val();
            if (inputFileVal.length > 0) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: formdata,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        toastr.remove();
                        $(form).find('span.error-text').text('');
                    },
                    success: function(response) {
                        $('.ci_csrf_data').val(response.token);
                        if ($.isEmptyObject(response.error)) {
                            if (response.status == 1) {
                                $(form)[0].reset();
                                toastr.success(response.msg);
                            } else {
                                toastr.error(response.msg);
                            }
                        } else {
                            $.each(response.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val);
                            });
                        }
                    }

                });
            } else {
                $(form).find('span.error-text').text('Por favor seleccione el favicon de la empresa, recomendado es PNG');
            }
        });

        $('#social_media_form').on('submit', function(e) {
            e.preventDefault();
            var csrfName = $('.ci_csrf_data').attr('name');
            var csrfHash = $('.ci_csrf_data').val();
            var form = this;
            var formdata = new FormData(form);
            formdata.append(csrfName, csrfHash);

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formdata,
                processData: false,
                dataType: 'json',
                contentType: false,
                cache: false,
                beforeSend: function() {
                    toastr.remove();
                    $(form).find('span.error-text').text('');
                },
                success: function(response) {
                    $('.ci_csrf_data').val(response.token);
                    if ($.isEmptyObject(response.error)) {
                        if (response.status == 1) {
                            //$(form)[0].reset();
                            toastr.success(response.msg);
                        } else {
                            toastr.error(response.msg);
                        }
                    } else {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        });
                    }
                }
            });
        });
    </script>
    <?= $this->endSection() ?>