<?php session_start();

require_once('conexionOracle.php');

$conn = new Conexion ();
$llamarMetodo = $conn->Conectar();

if (isset($_SESSION['usuario'])) {
	header('Location: inicio.php');

}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);


		$statement = $llamarMetodo->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
		$statement->execute (array(':usuario' => $usuario, ':password' => $password));
		
		$resultado = $statement->fetch();
		if ($resultado !== false) {
			$_SESSION['usuario'] = $usuario;
			header('Location: inicio.php');
			
		} else {
			$errores .= '
			<li>Usuario o contraseña incorrectos</li>';
		}

}

require 'views/login.view.php';
?>

