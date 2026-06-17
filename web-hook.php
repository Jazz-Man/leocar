<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$raw = file_get_contents('php://input');
$payload = json_decode($raw, true);

if (!$payload || !isset($payload['event_name'], $payload['id'])) {
    http_response_code(400);
    exit;
}

$logsDir = __DIR__ . '/logs';
if (!is_dir($logsDir)) {
    mkdir($logsDir, 0755, true);
}

$date = date('Y-m-d_His');
$shortId = substr($payload['id'], 0, 8);
$filename = sprintf('%s_%s_%s.json', $date, $payload['event_name'], $shortId);
file_put_contents(
    $logsDir . '/' . $filename,
    json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);

http_response_code(200);
echo 'OK';
