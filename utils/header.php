<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Max-Age: 600");

require_once __DIR__ . '/../db/db.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stockflix</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Stockflix</h1>
    </header>

    <main>