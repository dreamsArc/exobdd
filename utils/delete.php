<?php require_once 'header.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = $bdd->prepare('DELETE FROM film WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    header('Location: /index.php?delete=ok');
} else {
    header('Location: /index.php?delete=error');
}


?>