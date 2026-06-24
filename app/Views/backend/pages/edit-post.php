<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section("content") ?>
<?php use App\Libraries\CIAuth; ?>

<div class="page-header">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="title">
        <h4>Mensajes</h4>
      </div>
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= route_to('admin.home'); ?>">Inicio</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Editar Mensaje
          </li>
        </ol>
      </nav>
    </div>
    <div class="col-md-6 col-sm-12 text-right">
        <a href="<?= route_to("all-posts") ?>" class="btn btn-primary">Ver Todos los Mensajes</a>
    </div>
  </div>
</div>

<form action="<?= route_to('update-post') ?>" method="post" autocomplete="off" enctype="multipart/form-data" id="updatePostForm">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
    <input type="hidden" name="post_id" value="<?= $post->id ?>">
    <div class="row">
        <div class="col-md-9">
            <div class="card card-box mb-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><b>Titulo</b></label>
                        <input type="text" class="form-control" placeholder="Ingrese el titulo" value="<?= $post->title ?>" name="title">
                        <span class="text-danger error-text title_error"></span>
                    </div>

                     <div class="form-group">
                        <label for=""><b>Leyenda</b></label>
                        <textarea name="leyenda" id="leyenda" cols="30" rows="10" style="height:100%;" placeholder="Ingresar..." class="form-control"><?= $post->leyenda ?></textarea>
                        <span class="text-danger error-text leyenda_error"></span>
                    </div>       

                    <div class="form-group">
                        <label for=""><b>Contenido</b></label>
                        <textarea name="content" id="content" cols="30" rows="10" style="height:100%;" placeholder="Ingresar..." class="form-control"><?= $post->content ?></textarea>
                        <span class="text-danger error-text content_error"></span>
                    </div>                   
                </div>
            </div>
            <div class="card card-box mb-2">
                <h5 class="card-header weight-500">SEO</h5>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><b>Meta Title</b></label>
                        <input type="text" value="<?= $post->meta_title ?>" class="form-control" placeholder="Ingrese los meta title" name="meta_title">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Meta Keywords</b><small> Separado por comas</small></label>
                        <input type="text" value="<?= $post->meta_keywords ?>" class="form-control" placeholder="Ingrese los meta keywords" name="meta_keywords">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Meta Description</b><small> 175 caracteres</small></label>
                        <textarea name="meta_description" cols="30" rows="3" style="height:100%;" placeholder="Ingresar..." class="form-control"><?= $post->meta_description ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-box mb-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><b>Categoria</b></label>
                        <select class="custom-select form-control" name="category" id="">
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category->id ?>" <?= $category->id == $post->category_id ? 'selected' : '' ?>><?= $category->name ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="text-danger error-text category_error"></span>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Imagen</b><small> jpg, png</small></label>
                        <input type="file" class="form-control-file form-control" height="auto" name="featured_image">
                        <span class="text-danger error-text featured_image_error"></span>
                    </div>
                    <div class="d-block mb-3" style="max-width: 250px">
                        <img src="/images/posts/<?= $post->featured_image ?>" class="img-thumbnail" alt="" id="image-previewer" data-ijabo-default-img="">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Tags</b><small></small></label>
                        <input type="text" class="form-control" placeholder="Ingrese los Tags" value="<?= $post->tags ?>" name="tags" data-role="tagsinput">
                        <span class="text-danger error-text tags_error"></span>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Visible</b><small></small></label>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" name="visibility" id="customRadio1" class="custom-control-input" value="1" <?= $post->visibility == 1 ? 'checked' : '' ?>>
                            <label for="" class="custom-control-label">Publicar</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" name="visibility" id="customRadio2" class="custom-control-input" value="0" <?= $post->visibility == 0 ? 'checked' : '' ?>>
                            <label for="" class="custom-control-label">Privado</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</form>

<?= $this->endSection() ?>

<?= $this->section('stylesheets') ?>
    <link rel="stylesheet" href="/backend/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script src="/backend/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="/extra-assets/ckeditor/ckeditor.js"></script>
    <script>

        $(function(){
          var elfinderPath = '/extra-assets/elFinder/elfinder.src.php?integration=ckeditor&uid=<?= CIAuth::id() ?>';
         
          CKEDITOR.replace('content', {
            filebrowserBrowserUrl:elfinderPath,
            filebrowserImageBrowseUrl:elfinderPath+'&type=image',
            removeDialogTags:'link:upload;image:upload'
          });

          CKEDITOR.replace('leyenda', {
            filebrowserBrowserUrl:elfinderPath,
            filebrowserImageBrowseUrl:elfinderPath+'&type=image',
            removeDialogTags:'link:upload;image:upload'
          });


        });

        $('#updatePostForm').on('submit', function(e){
            e.preventDefault();
            var csrfName = $('.ci_csrf_data').attr('name'); //CSRF Token name
            var csrfHash = $('.ci_csrf_data').val();
            var form = this;
            var content = CKEDITOR.instances.content.getData();
            var leyenda = CKEDITOR.instances.leyenda.getData();
            var formdata = new FormData(form);
            formdata.append(csrfName, csrfHash);
            formdata.append('content', content);
            formdata.append('leyenda', leyenda);

            $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:formdata,
            processData:false,
            dataType:'json',
            contentType:false,
            cache:false,
            beforeSend:function(){
              toastr.remove();
              $(form).find('span.error.text').text('');
            },
            success:function(response){
              $('.ci_csrf_data').val(response.token);
              if ($.isEmptyObject(response.error)) {
                if (response.status == 1) {
                 // $(form)[0].reset();
                 // $('input[name="tags"]').tagsinput('removeAll');
                  toastr.success(response.msg);
                }else{
                  toastr.error(response.msg);
                }
              } else {
                $.each(response.error, function(prefix, val){
                  $(form).find('span.'+prefix+'_error').text(val);
                });
              }
            }
          });

        });

    </script>
<?= $this->endSection() ?> 