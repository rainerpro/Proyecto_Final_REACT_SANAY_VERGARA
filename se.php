<?php
session_start();
require_once 'db.php';

$mensaje_error = ''; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contraseña']);

    $conn = conectar_bd();
    if ($conn) {
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = $1";
        $result = pg_query_params($conn, $query, array($nombre_usuario));

        if ($result) {
            $usuario = pg_fetch_assoc($result);
            if ($usuario) {
                // Verifica que la contraseña sea correcta
                if (password_verify($contrasena, $usuario['contrasena'])) {
                    $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
                    header("Location: transferencia.php");
                    exit;
                } else {
                    $mensaje_error = "Contraseña incorrecta.";
                }
            } else {
                $mensaje_error = "Usuario no encontrado.";
            }
        } else {
            $mensaje_error = "Error al buscar el usuario: " . pg_last_error($conn);
        }

        pg_close($conn);
    } else {
        $mensaje_error = "Error de conexión a la base de datos.";
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
    <img class="wave" src="2.jpeg">
    <div class="container">
        <div class="img">
            <img src="banco.svg">
        </div>
        <div class="login-content">
            <form action="se.php" method="post">
                <img src="avatar.svg">
                <h2 class="title">Bienvenidos</h2>
                <?php if (!empty($mensaje_error)): ?>
                    <p style="color: red;"><?php echo htmlspecialchars($mensaje_error); ?></p>
                <?php endif; ?>
                <div class="input-div one focus">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input type="text" class="input" name="usuario" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" class="input" name="contraseña" required>
                    </div>
                </div>
                <a href="registro.php">Regístrate aquí</a>
                <input type="submit" class="btn" value="Iniciar Sesión">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
