<?php session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/newcod.view.php';
} else {
	header('Location: login.php');
}

?>