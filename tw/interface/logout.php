<?php
	session_start();
	unset($_SESSION['SI_USUCODIGO']);
	session_unset();
	session_destroy();
	header('location: .././');