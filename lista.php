<?php session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/lista.view.php';
} else {
	header('Location: login.php');
}

?>