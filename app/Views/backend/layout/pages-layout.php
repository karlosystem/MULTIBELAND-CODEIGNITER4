<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= isset($pageTitle) ? $pageTitle : "New Page Title"; ?></title>

    <link rel="icon" sizes="16x16" type="image/jpg" href="/images/blog/<?= get_settings()->blog_favicon ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/backend/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="/backend/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/backend/vendors/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="/extra-assets/ijabo/ijabo.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="/backend/vendors/styles/cards.css" />

    <?= $this->renderSection("stylesheets"); ?>
</head>

<body>

    <?php include('inc/header.php') ?>

    <?php include('inc/right-sidebar.php') ?>

    <?php include('inc/left-sidebar.php') ?>

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div>
                    <?= $this->renderSection('content'); ?>
                </div>

            </div>
            <?php include('inc/footer.php') ?>
        </div>
    </div>



    <script src="/backend/vendors/scripts/core.js"></script>
    <script src="/backend/vendors/scripts/script.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="/backend/vendors/scripts/process.js"></script>
    <script src="/backend/vendors/scripts/layout-settings.js"></script>
    <script src="/extra-assets/ijabo/ijabo.min.js"></script>
    <script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <?= $this->renderSection("scripts"); ?>
</body>

</html>