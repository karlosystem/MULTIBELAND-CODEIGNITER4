<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section("content") ?>

<div class="row">

    <div class="col-lg-3 col-sm-6">
        <div class="card-box bg-blue menu_admin">
            <div class="inner">
                <h3> Categorias </h3>
                <p> listado </p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </div>
            <a href="<?= route_to('categories'); ?>" class="card-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card-box bg-green menu_admin">
            <div class="inner">
                <h3> Mensajes </h3>
                <p> listado </p>
            </div>
            <div class="icon">
                <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
            <a href="<?= route_to("all-posts") ?>" class="card-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card-box bg-brown menu_admin">
            <div class="inner">
                <h3> Banners </h3>
                <p> Listado </p>
            </div>
            <div class="icon">
                <i class="fa fa-pencil-ruler"></i>
            </div>
            <a href="<?= route_to('banners'); ?>" class="card-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card-box bg-orangered menu_admin">
            <div class="inner">
                <h3> Contáctenos </h3>
                <p> Listado </p>
            </div>
            <div class="icon">
                <i class="fa fa-gifts"></i>
            </div>
            <a href="<?= route_to('contactenos'); ?>" class="card-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card-box bg-midnightblue menu_admin">
            <div class="inner">
                <h3> Perfil de Usuario </h3>
                <p> Listado </p>
            </div>
            <div class="icon">
                <i class="fa fa-comment-dollar"></i>
            </div>
            <a href="<?= route_to('admin.profile'); ?>" class="card-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card-box bg-darkcyan menu_admin">
            <div class="inner">
                <h3> General </h3>
                <p> Listado </p>
            </div>
            <div class="icon">
                <i class="fa fa-weight"></i>
            </div>
            <a href="<?= route_to('settings'); ?>" class="card-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>


</div>

<?= $this->endSection() ?>