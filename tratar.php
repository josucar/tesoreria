<?php session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/tratar.view.php';
} else {
	header('Location: login.php');
}

?>