<?php
// transferencia.php
require_once 'realizar_transferencia.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario_remitente = $_POST['nombre_usuario_remitente'] ?? null;
    $nombre_usuario_receptor = $_POST['nombre_usuario_receptor'] ?? null;
    $monto = $_POST['monto'] ?? null;

    if ($nombre_usuario_remitente && $nombre_usuario_receptor && $monto) {
        // Verificar si el remitente y el receptor existen
        $remitente = obtener_usuario_por_nombre($nombre_usuario_remitente);
        $receptor = obtener_usuario_por_nombre($nombre_usuario_receptor);

        if ($remitente && $receptor) {
            $resultado = realizar_transferencia($nombre_usuario_remitente, $nombre_usuario_receptor, $monto);
            if ($resultado) {
                $mensaje = "Transferencia realizada con éxito.";
            } else {
                $mensaje = "No se pudo completar la transferencia.";
            }
        } else {
            $mensaje = "El remitente o el receptor no existe.";
        }
    } else {
        $mensaje = "Todos los campos son obligatorios.";
    }
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
			<img src="transferir.svg">
		</div>
		<div class="login-content">
            <form action="transferencia.php" method="post">
				<h2 class="title">Transferir</h2>
           		<div class="input-div one focus">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nombre del remitente</h5>
           		   		<input type="text" class="input" name="nombre_usuario_remitente">
           		   </div>
           		</div>

                   <div class="input-div one focus">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nombre del receptor</h5>
           		   		<input type="text" class="input" name="nombre_usuario_receptor">
           		   </div>
           		</div>
        
                <div class="input-div one focus">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Valor</h5>
           		   		<input type="number" class="input" name="monto">
           		   </div>
           		</div>

            	<input type="submit" class="btn" value="Transferir">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>




