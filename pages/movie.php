<?php require_once '../utils/header.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = $bdd->prepare('SELECT * FROM film WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $film = $query->fetch();
}

?>

<section>
    <h2>
        <?php echo $film['titre']; ?>
    </h2>

    <img src="<?php echo $film['jaquette']; ?>" alt="<?php echo $film['titre']; ?>">
    <p>
        <?php echo $film['durée']; ?>
    </p>
    <p>
        <?php echo $film['genre']; ?>
    </p>
    <p>
        <?php echo $film['resume']; ?>
    </p>
    <a href="/pages/update.php?id=<?php echo $film['id']; ?>">Modifier</a>
    <a href="/utils/delete.php?id=<?php echo $film['id']; ?>">Supprimer</a>
</section>

<?php require_once '../utils/footer.php'; ?>