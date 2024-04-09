<!-- Bootstrap Css -->
<?php if ($colour_mode == 'light') : ?>
    <link href="<?= APP_URL ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<?php else : ?>
    <link href="<?= APP_URL ?>assets/css/bootstrap-dark.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<?php endif; ?>
<!-- Icons Css -->
<link href="<?= APP_URL ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<?php if ($colour_mode == 'light') : ?>
    <link href="<?= APP_URL ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<?php else : ?>
    <link href="<?= APP_URL ?>assets/css/app-dark.min.css" id="app-style" rel="stylesheet" type="text/css" />
<?php endif; ?>
<!-- Revi Css-->
<link href="<?= APP_URL ?>assets/css/revi.css" id="revi-style" rel="stylesheet" type="text/css" />
<!-- TOASTR CSS-->
<link href="<?= APP_URL ?>assets/libs/toastr/toastr.min.css" id="toastr-style" rel="stylesheet" type="text/css">