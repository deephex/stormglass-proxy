<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Tu peux restreindre ce domaine si besoin

$lat = $_GET['lat'] ?? null;
$lng = $_GET['lng'] ?? null;

if (!$lat || !$lng) {
    http_response_code(400);
    echo json_encode(['error' => 'Latitude and longitude are required.']);
    exit;
}

$apiKey = getenv('STORMGLASS_API_KEY'); // stockée dans Render

$url = "https://api.stormglass.io/v2/weather/point?lat=$lat&lng=$lng&params=waterTemperature";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: $apiKey"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

http_response_code($httpCode);
echo $response;
?>