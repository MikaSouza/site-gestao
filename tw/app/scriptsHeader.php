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
	<?php
		if(is_file('../css/pages/'.$namePage.'.css')){
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/pages/{$namePage}.css\">";
		}
	?>