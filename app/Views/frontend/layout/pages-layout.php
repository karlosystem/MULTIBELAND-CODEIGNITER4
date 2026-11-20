<!doctype html>
<html lang="en">

<head>
    <title> <?= isset($pageTitle) ? $pageTitle : 'Nueva Pagina Titulo' ?> </title>
    <meta charset="utf-8">
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= $this->renderSection('page_meta'); ?>
    <meta name="author" content="Carlos Marquina">

    <link rel="shortcut icon" href="<?= base_url('images/blog/' . get_settings()->blog_favicon) ?>" type="image/x-icon">

    <link href="//fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('frontend/css/style-starter.css') ?>">
    <link rel="stylesheet" href="<?= base_url('frontend/css/home-redesign.css') ?>"> <!-- ← NUEVA LÍNEA -->
    <link rel="stylesheet" href="<?= base_url('frontend/css/nosotros.css') ?>"> <!-- ← NUEVA LÍNEA -->
    <link rel="stylesheet" href="<?= base_url('frontend/css/cobertura.css') ?>"> <!-- ← NUEVA LÍNEA -->
    <link rel="stylesheet" href="<?= base_url('frontend/css/servicios.css') ?>"> <!-- ← NUEVA LÍNEA -->
    <link rel="stylesheet" href="<?= base_url('frontend/css/tapiceria.css') ?>"> <!-- ← NUEVA LÍNEA -->
    <link rel="stylesheet" href="<?= base_url('frontend/css/soldadura.css') ?>"> <!-- ← NUEVA LÍNEA -->
    <link rel="stylesheet" href="<?= base_url('frontend/css/vidrieria.css') ?>"> <!-- ← NUEVA LÍNEA -->
    <link rel="stylesheet" href="<?= base_url('frontend/css/restauracion-cabinas.css') ?>"> <!-- ← NUEVA LÍNEA -->

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E259748V6H"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-E259748V6H');
    </script>

</head>

<body>

    <?php include('inc/header.php') ?>

    <?= $this->renderSection('content') ?>

    <?php include('inc/footer.php') ?>