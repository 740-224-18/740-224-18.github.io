<?php

require 'config.php';

$sql = "SELECT * FROM tbl_gps";
$result = $db->query($sql);
if (!$result) {
    echo "Error: " . $sql . "<br>" . $db->error;
    exit();
}

$rows = $result->fetch_all(MYSQLI_ASSOC);

?>
<html>
<head>
<title>AhmadLogs - Show Locations on Mapbox</title>
</head>
<style>
body {
    font-family: Arial;
}

#map-layer {
    margin: 20px 0px;
    max-width: 700px;
    min-height: 400px; /* Agregado px */
}
</style>
<body>
    <h1>AhmadLogs - Show Locations on Mapbox</h1>
    <div id="map-layer"></div>

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css" rel="stylesheet" />

    <script>
        mapboxgl.accessToken = '<?php echo MAPBOX_API_KEY; ?>';
        var map = new mapboxgl.Map({
            container: 'map-layer',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [<?php echo $rows[0]['lng']; ?>, <?php echo $rows[0]['lat']; ?>], // Centro del mapa en la primera ubicación
            zoom: 10
        });

        <?php foreach ($rows as $row) { ?>
            new mapboxgl.Marker()
                .setLngLat([<?php echo $row['lng']; ?>, <?php echo $row['lat']; ?>])
                .addTo(map);
        <?php } ?>
    </script>
</body>
</html>
