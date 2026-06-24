<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section("content") ?>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Categorias</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= route_to('admin.home'); ?>">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Categorias
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
                        Categorias
                    </div>
                    <div class="pull-right">
                        <a href="" class="btn btn-default btn-sm p-0" role="button" id="add_category_btn">
                            <i class="fa fa-plus-circle"></i> Agregar Categoria
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-stripe" id="categories-table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre de Categoria</th>
                            <th scope="col">N. de sub Categorias</th>
                            <th scope="col">Accion</th>
                            <th scope="col">Order</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="card card-box">
            <div class="card-header">
                <div class="clearfix">
                    <div class="pull-left">
                        SubCategorias
                    </div>
                    <div class="pull-right">
                        <a href="" class="btn btn-default btn-sm p-0" role="button" id="add_subcategory_btn">
                            <i class="fa fa-plus-circle"></i> Agregar SubCategoria
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-stripe" id="sub-categories-table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre de SubCategoria</th>
                            <th scope="col">Categorias</th>
                            <th scope="col">No de Mensajes</th>
                            <th scope="col">Accion</th>
                            <th scope="col">Orden</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include('modals/category-modal-form.php') ?>
<?php include('modals/edit-category-modal-form.php') ?>
<?php include('modals/subcategory-modal-form.php') ?>
<?php include('modals/edit-subcategory-modal-form.php') ?>

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
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).on('click', '#add_category_btn', function(e) {
        e.preventDefault();
        var modal = $('body').find('div#category-modal');
        var modal_title = 'Agregar Categoria';
        var modal_btn_text = 'Agregar';
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input.error-text').html('');
        modal.find('input[type="text"]').val('');
        modal.modal('show');
    });

    $('#add_category_form').on('submit', function(e) {
        e.preventDefault();
        var csrfName = $('.ci_csrf_data').attr('name');
        var csrfHash = $('.ci_csrf_data').val;
        var form = this;
        var modal = $('body').find('div#category-modal');
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
                        modal.modal('hide');
                        toastr.success(response.msg);
                        categories_DT.ajax.reload(null, false);
                        //subcategoriesDTcategories_DT.ajax.reload(null, false);
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

    var categories_DT = $('#categories-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?= route_to('get-categories') ?>",
        dom: "Brtip",
        info: true,
        fnCreatedRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            console.log(data);
            $('td', row).parent().attr('data-index', data[0]).attr('data-ordering', data[4]);

        },
        columnDefs: [{
                orderable: false,
                targets: [0, 1, 2, 3]
            },
            {
                visible: false,
                targets: 4
            }
        ],
        order: [
            [4, 'asc']
        ]
    });

    //editar categoria
    $(document).on('click', '.editCategoryBtn', function(e) {
        e.preventDefault();
        var category_id = $(this).data('id');
        var url = "<?= route_to('get-category') ?>";
        $.get(url, {
            category_id: category_id
        }, function(response) {
            var modal_title = 'Editar Categoria';
            var modal_btn_text = 'Guardar Cambios';
            var modal = $('body').find('div#edit-category-modal');
            modal.find('form').find('input[type="hidden"][name="category_id"]').val(category_id);
            modal.find('.modal-title').html(modal_title);
            modal.find('.modal-footer > button.action').html(modal_btn_text);
            modal.find('input[type="text"]').val(response.data.name);
            modal.find('span.error-text').html('');
            modal.modal('show');
        }, 'json');
    });

    $('#update_category_form').on('submit', function(e) {
        e.preventDefault();
        var csrfName = $('.ci_csrf_data').attr('name');
        var csrfHash = $('.ci_csrf_data').val();
        var form = this;
        var modal = $('body').find('div#edit-category-modal');
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
                        modal.modal('hide');
                        toastr.success(response.msg);
                        categories_DT.ajax.reload(null, false);
                        subcategoriesDT.ajax.reload(null, false);
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

    //eliminar categoria...
    $(document).on('click', '.deleteCategoryBtn', function(e) {
        e.preventDefault();
        var category_id = $(this).data('id');
        var url = "<?= route_to('delete-category') ?>";
        Swal.fire({
            title: 'Realmente deseas eliminar la categoria ?',
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
                    category_id: category_id
                }, function(response) {
                    if (response.status == 1) {
                        categories_DT.ajax.reload(null, false);
                        toastr.success(response.msg);
                    } else {
                        toastr.error(response.msg);
                    }
                }, 'json');
            }
        });
    });

    $('table#categories-table').find('tbody').sortable({
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

            var url = "<?= route_to('reorder-categories') ?>";
            $.get(url, {
                positions: positions
            }, function(response) {
                if (response.status == 1) {
                    categories_DT.ajax.reload(null, false);
                    subcategoriesDT.ajax.reload(null, false);
                    toastr.success(response.msg);

                } else {

                }
            }, 'json');
        }
    });

    $(document).on('click', '#add_subcategory_btn', function(e) {
        e.preventDefault();
        var modal_title = 'Agregar Sub Categoria';
        var modal_btn_text = 'Agregar';
        var modal = $('body').find('div#sub-category-modal');
        var select = modal.find('select[name="parent_cat"]');
        var url = "<?= route_to('get-parent-categories') ?>";
        $.getJSON(url, {
            parent_category_id: null
        }, function(response) {
            select.find('option').remove();
            select.html(response.data);
        });
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('input[type="text"]').val('');
        modal.find('textarea').html('');
        modal.find('span.error-text').html('');
        modal.modal('show');
    });

    $(document).on('submit', '#add_subcategory_form', function(e) {
        e.preventDefault();
        var csrfName = $('.ci_csrf_data').attr('name');
        var csrfHash = $('.ci_csrf_data').val();
        var form = this;
        var modal = $('body').find('div#sub-category-modal');
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
                        modal.modal('hide');
                        toastr.success(response.msg);
                        subcategoriesDT.ajax.reload(null, false);
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

    var subcategoriesDT = $('#sub-categories-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?= route_to('get-subcategories') ?>",
        dom: "Brtip",
        info: true,
        fnCreatedRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            $('td', row).parent().attr('data-index', data[0]).attr('data-ordering', data[5]);
        },
        columnDefs: [{
                orderable: false,
                targets: [0, 1, 2, 3, 4]
            },
            {
                visible: false,
                targets: 5
            },
        ],
        order: [
            [5, 'asc']
        ]
    });

    $(document).on('click', '.editSubCategoryBtn', function(e) {
        e.preventDefault();
        var subcategory_id = $(this).data('id');
        var get_subcategory_url = "<?= route_to('get-subcategory') ?>";
        var get_parent_categories_url = "<?= route_to('get-parent-categories') ?>";
        var modal_title = 'Editar Sub Categoria';
        var modal_btn_text = 'Guardar Cambios';
        var modal = $('body').find('div#edit-sub-category-modal');
        modal.find('.modal-title').html(modal_title);
        modal.find('.modal-footer > button.action').html(modal_btn_text);
        modal.find('span.error-text').html('');
        var select = modal.find('select[name="parent_cat"]');
        $.getJSON(get_subcategory_url, {
            subcategory_id: subcategory_id
        }, function(response) {
            modal.find('input[type="text"][name="subcategory_name"]').val(response.data.name);
            modal.find('form').find('input[type="hidden"][name="subcategory_id"]').val(response.data.id);
            modal.find('form').find('textarea[name="description"]').val(response.data.description);
            $.getJSON(get_parent_categories_url, {
                parent_category_id: response.data.parent_cat
            }, function(response) {
                select.find('option').remove();
                select.html(response.data);
            });
            modal.modal('show');
        });
    });

    $('#update_subcategory_form').on('submit', function(e) {
        e.preventDefault();
        var csrfName = $('.ci_csrf_data').attr('name');
        var csrfHash = $('.ci_csrf_data').val();
        var form = this;
        var modal = $('body').find('div#edit-sub-category-modal');
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
                        modal.modal('hide');
                        toastr.success(response.msg);
                        subcategoriesDT.ajax.reload(null, false);
                        //categoriesDT.ajax.reload(null, false);
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

    $('table#sub-categories-table').find('tbody').sortable({
        update: function(event, ui) {
            $(this).children().each(function(index) {
                if ($(this).attr('data-ordering') != (index + 1)) {
                    $(this).attr('data-ordering', (index + 1)).addClass('updated');
                }
            });
            var positions = [];
            $('.updated').each(function() {
                positions.push([$(this).attr('data-index'), $(this).attr('data-ordering')]);
                $(this).removeClass('updated');
            });

            var url = "<?= route_to('reorder-subcategories') ?>";

            $.getJSON(url, {
                positions: positions
            }, function(response) {
                if (response.status == 1) {
                    subcategoriesDT.ajax.reload(null, false);
                    toastr.success(response.msg);
                }
            });
        }
    });

    $(document).on('click', '.deleteSubCategoryBtn', function(e) {
        e.preventDefault();
        var subcategory_id = $(this).data('id');
        var url = "<?= route_to('delete-subcategory') ?>";
        Swal.fire({
            title: 'Realmente deseas eliminar la subcategoria ?',
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
                    subcategory_id: subcategory_id
                }, function(response) {
                    if (response.status == 1) {
                        subcategoriesDT.ajax.reload(null, false);
                        categoriesDT.ajax.reload(null, false);
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