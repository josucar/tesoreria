<?php session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/reporte.view.php';
} else {
	header('Location: login.php');
}

?>