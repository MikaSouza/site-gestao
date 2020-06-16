	<!-- Bootstrap -->
	<script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
	<!-- MaskedInput -->
	<script type="text/javascript" src="../libs/jquery.maskedinput/jquery.maskedinput.min.js"></script>
	<!-- jQuery Ui -->
	<script type="text/javascript" src="../libs/jquery.ui/jquery-ui.min.js"></script>
	<!-- jQuery Validate -->
	<script type="text/javascript" src="../libs/jquery.validate/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../libs/jquery.validate/additional-methods.min.js"></script>
	<!-- TyniMCE -->
	<script type="text/javascript" src="../libs/tinymce/tinymce.min.js"></script>
	<!-- DataTables -->
	<script type="text/javascript" src="../libs/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../libs/datatables/Buttons-1.2.2/js/buttons.bootstrap.min.js"></script>
	<!-- Bootstrap Select -->
	<script type="text/javascript" src="../libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="../libs/bootstrap-select/dist/js/i18n/defaults-pt_BR.min.js"></script>
	<!-- Bootstrap ColorPicker -->
	<script type="text/javascript" src="../libs/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<!-- Bootstrap DataPicker -->
	<script type="text/javascript" src="../libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="../libs/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>
	<!-- cropperjs -->
	<script type="text/javascript" src="../libs/cropperjs/dist/cropper.min.js"></script>
	<!-- Default -->
	<script type="text/javascript" src="../js/grids.min.js"></script>
	<script type="text/javascript" src="../js/scripts.min.js"></script>
	<?php
		if(isset($namePage)) :
			if (file_exists('../js/min/'.$namePage.'.js')) :
	?>
				<script type="text/javascript" src="../js/min/<?= $namePage ?>.js"></script>
	<?php	else: ?>
				<script type="text/javascript" src="../js/<?= $namePage ?>.js"></script>
	<?php 	endif;
		endif;
	?>
