<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section("content") ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Todos los Mensajes</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= route_to('admin.home'); ?>">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Todos los Mensajes
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <a href="<?= route_to("new-post") ?>" class="btn btn-primary">
                Nuevo Mensaje
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12" mb-4>
        <div class="card card-box">
            <div class="card-header">
                <div class="clearfix">
                    <div class="pull-left">Todos los Mensajes</div>
                    <div class="pull-right"></div>
                </div>
            </div>
            <div class="card-body">
                <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline collapsed" id="posts-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Visible</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('stylesheets') ?>
<link rel="stylesheet" href="/backend/src/plugins/datatables/css/datatables.bootstrap4.min.css">
<link rel="stylesheet" href="/backend/src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.css">
<link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.structure.css">
<link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.theme.min.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="/backend/src/plugins/datatables/js/jquery.datatables.min.js"></script>
<script src="/backend/src/plugins/datatables/js/datatables.bootstrap4.min.js"></script>
<script src="/backend/src/plugins/datatables/js/datatables.responsive.min.js"></script>
<script src="/backend/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.js"></script>
<script>
    var posts_DT = $('table#posts-table').DataTable({
        scrollCollapse: true,
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: "<?= route_to('get-posts') ?>",
        "dom": "Brtip",
        info: true,
        fnCreatedRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
        },
        columDefs: [{
            orderable: false,
            targets: [0, 1, 2, 3, 4, 5]
        }]
    });

    $(document).on('click', '.deletePostBtn', function(e) {
        e.preventDefault();
        var post_id = $(this).data('id');
        var url = "<?= route_to('delete-post') ?>";
        Swal.fire({
            title: 'Realmente deseas eliminar el mensaje ?',
            icon: 'warning',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            denyButtonText: `No eliminar`,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            width: 400,
            allowOutsideClick: false,
        }).then(function(result) {
            if (result.value) {
                $.get(url, {
                    post_id: post_id
                }, function(response) {
                    if (response.status == 1) {
                        posts_DT.ajax.reload(null, false);
                        toastr.success(response.msg);
                    } else {
                        toastr.error(response.msg);
                    }
                }, 'json');
            }
        });
    });
</script>
<?= $this->endSection() ?>