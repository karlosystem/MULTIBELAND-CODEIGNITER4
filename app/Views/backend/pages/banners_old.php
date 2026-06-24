<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section("content") ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
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
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card card-box">
            <div class="card-header">
                <div class="clearfix">
                    <div class="pull-left">
                        Banners
                    </div>
                    <div class="pull-right">
                        <a href="<?= route_to('new-banner') ?>" class="btn btn-default btn-sm p-0" role="button" id="add_banner_btn">
                            <i class="fa fa-plus-circle"></i> Agregar Banner
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-stripe" id="banners-table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Order</th>
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
    var banner_DT = $('table#banners-table').DataTable({
        scrollCollapse: true,
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: "<?= route_to('get-banners') ?>",
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

    $(document).on('click', '.deleteBannerBtn', function(e) {
        e.preventDefault();
        var banner_id = $(this).data('id');
        var url = "<?= route_to('delete-banner') ?>";
        Swal.fire({
            title: 'Realmente deseas eliminar el banner ?',
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
                    banner_id: banner_id
                }, function(response) {
                    if (response.status == 1) {
                        banner_DT.ajax.reload(null, false);
                        toastr.success(response.msg);
                    } else {
                        toastr.error(response.msg);
                    }
                }, 'json');
            }
        });
    });

    $('table#banners-table').find('tbody').sortable({
        update: function(event, ui) {
            $(this).children().each(function(index) {
                if ($(this).attr('data-ordering') != (index + 1)) {
                    $(this).attr('data-ordering', (index + 1)).addClass('updated');
                }
            });
            var positions = [];
            $('.updated').each(function() {
                positions.push([$(this).attr('data-index'), $(this).attr('data-ordering')]);
            });

            var url = "<?= route_to('reorder-banners') ?>";
            $.get(url, {
                positions: positions
            }, function(response) {
                if (response.status == 1) {
                    banner_DT.ajax.reload(null, false);
                    toastr.success(response.msg);
                } else {

                }
            }, 'json');
        }
    });
</script>

<?= $this->endSection() ?>