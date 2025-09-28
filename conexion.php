<?php

require_once __DIR__ . '/lib/rb.php';
$host = "localhost";   // Host
$dbname = "gestion_usuario";     // Nombre BD
$username = "root";          // Usuario
$password = "";        // Contraseña




// $host = "sql107.infinityfree.com";   // Host
// $dbname = "if0_39709972_rapigas";     // Nombre BD
// $username = "if0_39709972";          // Usuario
// $password = "yxCa5YwgPH1kZU";        // Contraseña


// Configuramos RedBeanPHP
R::setup("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Opcional: congelar esquema en producción (no crea/alterar tablas automáticamente)
R::freeze(true);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Solo mostrar mensaje de conexión en modo debug
    // echo "✅ Conexión exitosa";
} catch (PDOException $e) {
    die("❌ Error en la conexión: " . $e->getMessage());
}
?>