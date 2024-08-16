<?php require 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>AhmadLogs - Test POST Data</title>
</head>
<body>

<h2>AhmadLogs - Test POST Data</h2>

<form method="POST" action="<?php echo POST_DATA_URL; ?>">
    <label for="apikey">API Key:</label><br>
    <!-- Considera eliminar el valor predeterminado de la clave API para mayor seguridad -->
    <input type="text" id="api_key" name="api_key" required><br>

    <label for="latitude">Latitude:</label><br>
    <input type="text" id="lat" name="lat" value="-33.890541" required pattern="-?\d+(\.\d+)?"><br>

    <label for="longitude">Longitude:</label><br>
    <input type="text" id="lng" name="lng" value="151.274857" required pattern="-?\d+(\.\d+)?"><br><br>

    <input type="submit" value="Submit">
</form> 

</body>
</html>
