<?php session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/menu.view.php';
} else {
	header('Location: login.php');
}

?>