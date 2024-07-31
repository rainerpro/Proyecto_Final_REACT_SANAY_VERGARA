<?php
require_once 'usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    $nombre_completo = $_POST['nombre_completo'];
    $num_cedula = $_POST['num_cedula'];
    $saldo_inicial = $_POST['saldo_inicial'];

    $mensaje = registrar_usuario($nombre_usuario, $contrasena, $nombre_completo, $num_cedula, $saldo_inicial);
    echo $mensaje;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="img">
			<img src="registro.svg">
		</div>
		<div class="login-content">
            <form action="registro.php" method="post">
				<h2 class="title">Registrar</h2>
           		<div class="input-div one focus">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nombre de Usuario</h5>
           		   		<input type="text" class="input" name="nombre_usuario">
           		   </div>
           		</div>
           		<div class="input-div one focus">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" class="input" name="contrasena">
            	   </div>
            	</div>

                <div class="input-div one focus">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nombre completo</h5>
           		   		<input type="text" class="input" name="nombre_completo">
           		   </div>
           		</div>

                <div class="input-div one focus">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Número de cédula</h5>
           		   		<input type="text" class="input" name="num_cedula">
           		   </div>
           		</div>

                <div class="input-div one focus">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Saldo inicial</h5>
           		   		<input type="number" class="input" name="saldo_inicial">
           		   </div>
           		</div>

            	<input type="submit" class="btn" value="Registrarse">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
