<?php
require_once 'db.php';

function registrar_usuario($nombre_usuario, $contrasena, $nombre_completo, $num_cedula, $saldo_inicial) {
    $conn = conectar_bd();
    $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

    // Verificar si el número de cédula ya existe
    $query = "SELECT 1 FROM usuarios WHERE num_cedula = $1";
    $result = pg_query_params($conn, $query, array($num_cedula));

    if (pg_num_rows($result) > 0) {
        pg_close($conn);
        return "El número de cédula ya está registrado.";
    }

    // Registrar nuevo usuario
    $query = "INSERT INTO usuarios (nombre_usuario, contrasena, nombre_completo, num_cedula, saldo) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $query, array($nombre_usuario, $contrasena_hash, $nombre_completo, $num_cedula, $saldo_inicial));
    pg_close($conn);

    if ($result) {
        return "Usuario registrado correctamente.";
    } else {
        return "Error al registrar el usuario: " . pg_last_error($conn);
    }
}
?>
