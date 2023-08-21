<?php
$host = '';
$user = '';
$pass = '';
$db = '';
$port = 3307;

require_once '.config.php';
try {
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $db . ';port=' . $port . ';charset=utf8', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
;