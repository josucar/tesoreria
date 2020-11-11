<?php session_start();

require_once('conexionOracle.php');

$conn = new Conexion ();
$llamarMetodo = $conn->Conectar();

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda volver a registrar un usuario.
if (isset($_SESSION['usuario'])) {
	header('Location: inicio.php');
	die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Validamos que los datos hayan sido rellenados
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
    $password2 = $_POST['password2'];

    $errores = '';

	// Comprobamos que ninguno de los campos este vacio.
	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores = '<li>Por favor rellena todos los datos correctamente</li>';
	} else {

		// Comprobamos que el usuario no exista ya.
		$statement = $llamarMetodo->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));

		// El metodo fetch nos va a devolver el resultado o false en caso de que no haya resultado.
		$resultado = $statement->fetch();

		// Si resultado es diferente a false entonces significa que ya existe el usuario.
		if ($resultado != false) {
			$errores .= '<li>El nombre de usuario ya existe</li>';
		}

		// Hasheamos nuestra contraseña para protegerla un poco.
		# OJO: La seguridad es un tema muy complejo, aqui solo estamos haciendo un hash de la contraseña,
		# pero esto no asegura por completo la informacion encriptada.
		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

		// Comprobamos que las contraseñas sean iguales.
		if ($password != $password2) {
			$errores.= '<li>Las contraseñas no son iguales</li>';
		}
	}

	// Comprobamos si hay errores, sino entonces agregamos el usuario y redirigimos.
	if ($errores == '') {
		$statement = $llamarMetodo->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
		$statement->execute(array(
				':usuario' => $usuario,
				':pass' => $password
			));

		// Despues de registrar al usuario redirigimos para que inicie sesion.
		header('Location: login.php');
	}


}



require 'views/registro.view.php';

?>