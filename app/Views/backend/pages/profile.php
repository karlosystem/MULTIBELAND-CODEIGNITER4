<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section("content") ?>
<div class="page-header">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="title">
        <h4>Perfil de Usuario</h4>
      </div>
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= route_to('admin.home'); ?>">Inicio</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Perfil de Usuario
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
    <div class="pd-20 card-box height-100-p">
      <div class="profile-photo">
        <a href="javascript:;" onclick="event.preventDefault();document.getElementById('user_profile_file').click();" class="edit-avatar"><i class="fa fa-pencil"></i></a>
        <input type="file" name="user_profile_file" id="user_profile_file" class="d-none" style="opacity: 0">
        <img src="<?= get_user()->picture == null ? '/images/users/user.png' : '/images/users/' . get_user()->picture ?>" class="avatar-photo ci-avatar-photo" />
      </div>
      <h5 class="text-center h5 mb-0 ci-user-name"><?= get_user()->name; ?></h5>
      <p class="text-center text-muted font-14 ci-user-email"><?= get_user()->email; ?></p>
    </div>
  </div>
  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
    <div class="card-box height-100-p overflow-hidden">
      <div class="profile-tab height-100-p">
        <div class="tab height-100-p">
          <ul class="nav nav-tabs customtab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                data-toggle="tab"
                href="#datos_personales"
                role="tab">Datos Personales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Cambiar Password</a>
            </li>

          </ul>
          <div class="tab-content">
            <div
              class="tab-pane fade show active" id="datos_personales" role="tabpanel">
              <div class="pd-20">
                <form action="<?= route_to('update-personal-details') ?>" method="POST" id="personal_details_from">
                  <?= csrf_field(); ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="name" placeholder="Ingrese su nombre" class="form-control" value="<?= get_user()->name ?>">
                        <span class="text-danger error-text name_error"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Usuario</label>
                        <input type="text" name="username" placeholder="Ingrese su Usuario" class="form-control" value="<?= get_user()->username ?>">
                        <span class="text-danger error-text username_error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Bio</label>
                    <textarea name="bio" id="" cols="30" rows="10" class="form-control" placeholder="Ingrese su bio.."><?= get_user()->bio; ?></textarea>
                    <span class="text-danger error-text bio_error"></span>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane fade" id="tasks" role="tabpanel">
              <div class="pd-20 profile-task-wrap">
                <div class="container pd-0">
                  <form action="<?= route_to('change-password'); ?>" method="post" id="change_password_form">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Password actual</label>
                          <input type="password" name="current_password" class="form-control" placeholder="Ingrese su password actual">
                          <span class="text-danger error-text current_password_error"></span>

                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Nuevo Password</label>
                          <input type="password" name="new_password" class="form-control" placeholder="Ingrese su password muevo">
                          <span class="text-danger error-text new_password_error"></span>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Confirmar Nuevo Password</label>
                          <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirme su password muevo">
                          <span class="text-danger error-text confirm_new_password_error"></span>
                        </div>
                      </div>



                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $('#personal_details_from').on('submit', function(e) {
    e.preventDefault();
    var form = this;
    var formdata = new FormData(form);

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method'),
      data: formdata,
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function() {
        toastr.remove();
        $(form).find('span.error-text').text('');
      },
      success: function(response) {
        if ($.isEmptyObject(response.error)) {
          if (response.status == 1) {
            $(".ci-user-name").each(function() {
              $(this).html(response.user_info.name)
            });
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
    })

  });

  $('#user_profile_file').ijaboCropTool({
    preview: '.ci-avatar-photo',
    setRatio: 1,
    allowedExtensions: ['jpg', 'jpeg', 'png'],
    buttonsText: ['CROP', 'QUIT'],
    buttonsColor: ['#30bf7d', '#ee5155', -15],
    processUrl: '<?= route_to('update-profile-picture'); ?>',
    onSuccess: function(message, element, status) {
      if (status == 1) {
        toastr.success(message);
      } else {
        toastr.error(message);
      }
    },
    onError: function(message, element, status) {
      alert(message);
    }
  });

  //cambiar password
  $('#change_password_form').on('submit', function(e) {
    e.preventDefault();
    //CSRF Hash
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
        //actualizar CSRF Hash
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