<!-- jQuery -->
<script type="text/javascript" src="../libs/jquery/jquery.min.js"></script>
<!-- SweetAlert -->
<link rel="stylesheet" type="text/css" href="../libs/sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="../libs/sweetalert/dist/sweetalert.min.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="../libs/font-awesome/font-awesome.css">
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="../libs/bootstrap/css/bootstrap.min.css">
<!-- jQuery Ui -->
<link rel="stylesheet" type="text/css" href="../libs/jquery.ui/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="../libs/jquery.ui/jquery-ui.theme.min.css">
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="../libs/datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../libs/datatables/Buttons-1.2.2/css/buttons.bootstrap.min.css">
<!-- Bootstrap Select -->
<link rel="stylesheet" type="text/css" href="../libs/bootstrap-select/dist/css/bootstrap-select.min.css">
<!-- Bootstrap ColorPicker -->
<link rel="stylesheet" type="text/css" href="../libs/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<!-- Bootstrap DatePicker -->
<link rel="stylesheet" type="text/css" href="../libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
<!-- cropperjs -->
<link rel="stylesheet" type="text/css" href="../libs/cropperjs/dist/cropper.min.css">
<!-- Default -->
<link rel="stylesheet" type="text/css" href="../css/elements.min.css">
<link rel="stylesheet" type="text/css" href="../css/header.min.css">
<link rel="stylesheet" type="text/css" href="../css/portfolio.min.css">
<link rel="stylesheet" type="text/css" href="../css/theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.min.css">
<link rel="stylesheet" type="text/css" href="../css/error-admin.css">

<!-- favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="../../img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../../img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../../img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../../img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../../img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../../img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../../img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../../img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../../img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="../../img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../../img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../img/favicon/favicon-16x16.png">
<link rel="manifest" href="../../img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../../img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<?php
if (is_file('../css/pages/' . $namePage . '.css')) {
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/pages/{$namePage}.css\">";
}
?>