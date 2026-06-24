<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section("content") ?>

<?php

use App\Libraries\CIAuth; ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Banners</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= route_to('admin.home'); ?>">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Banners
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <a href="<?= route_to("banners") ?>" class="btn btn-primary">Ver Todos los Banners</a>
        </div>
    </div>
</div>

<form action="<?= route_to("create-banner") ?>" method="post" autocomplete="off" enctype="multipart/form-data" id="addBannerForm">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
    <div class="row">
        <div class="col-md-9">
            <div class="card card-box mb-2">
                <div class="card-body">

                    <div class="form-group">
                        <label for=""><b>Titulo</b></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Ingrese el titulo" name="name">
                        <span class="text-danger error-text name_error"></span>
                    </div>

                    <div class="form-group">
                        <label for=""><b>Descripción</b></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Ingrese la descripción" name="description">
                        <span class="text-danger error-text description_error"></span>
                    </div>

                    <div class="form-group">
                        <label for=""><b>Link</b></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Ingrese el Link" name="link">
                        <span class="text-danger error-text link_error"></span>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-box mb-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><b>Imagen</b><small> jpg, png</small></label>
                        <input type="file" class="form-control-file form-control" height="auto" name="featured_image">
                        <span class="text-danger error-text featured_image_error"></span>
                    </div>
                    <div class="d-block mb-3" style="max-width: 250px">
                        <img src="" class="img-thumbnail" alt="" id="image-previewer" data-ijabo-default-img="">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Visible</b><small></small></label>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" name="visibility" id="customRadio1" class="custom-control-input" value="1" checked>
                            <label for="" class="custom-control-label">Publicar</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" name="visibility" id="customRadio2" class="custom-control-input" value="0">
                            <label for="" class="custom-control-label">Privado</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Crear Banner</button>
    </div>

</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $('#addBannerForm').on('submit', function(e) {
        e.preventDefault();
        var csrfName = $('.ci_csrf_data').attr('name'); //CSRF Token name
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
                $(form).find('span.error.text').text('');
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
    });
</script>
<?= $this->endSection() ?>