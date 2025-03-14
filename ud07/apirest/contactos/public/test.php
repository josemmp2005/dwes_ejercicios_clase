<?php
header('Content-Type: application/json');

$headers = getallheaders();
echo json_encode($headers, JSON_PRETTY_PRINT);
?>
