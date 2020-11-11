<?php session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/cuentaCorriente.view.php';
} else {
	header('Location: login.php');
}

?>