<?php 
define('DB_HOST', '154.12.254.242'); 
define('DB_USERNAME', 'ratiosof74bo_uv_bd_user'); 
define('DB_PASSWORD', 'Estudiantes@2024'); 
define('DB_NAME', 'ratiosof74bo_uv_bd');

// Define la clave API de Mapbox
define('MAPBOX_API_KEY', 'pk.eyJ1Ijoicm9kcmlnby10dW1hY2hvIiwiYSI6ImNsdXV0aWxpajAycmMycXBkdHM0NWJuczkifQ.-d76vw1-ZsQj28W9q0DO9w');

// Si no necesitas una clave específica para el ESP8266, puedes eliminar esta línea
// define('ESP32_API_KEY', 'Ad5F10jkBM0');

// Actualiza la URL de datos
define('POST_DATA_URL', 'https://rodrigotumacho.000webhostapp.com/gpsdata.php');

date_default_timezone_set('Asia/Karachi');

// Conexión a la base de datos
try {
    $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($db->connect_errno) {
        throw new Exception("Connection failed: " . $db->connect_error);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    die("Database connection failed. Please try again later.");
}
?>
