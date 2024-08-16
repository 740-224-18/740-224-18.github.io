<?php 
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = escape_data($_POST["api_key"]);
    
    // Si no usas una clave API específica, comenta o elimina esta línea
    // if($api_key == ESP32_API_KEY) {
    
    $latitude = escape_data($_POST["lat"]);
    $longitude = escape_data($_POST["lng"]);

    // Usando consultas preparadas
    $stmt = $db->prepare("INSERT INTO tbl_gps (lat, lng, created_date) VALUES (?, ?, ?)");
    $stmt->bind_param("dds", $latitude, $longitude, $created_date);

    $created_date = date("Y-m-d H:i:s");

    if ($stmt->execute()) {
        echo "OK. INSERT ID: " . $stmt->insert_id;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    
    // } else {
    //     echo "Wrong API Key";
    // }
} else {
    echo "No HTTP POST request found";
}

function escape_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
