<?php session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/cuenta.view.php';
} else {
	header('Location: login.php');
}

?>