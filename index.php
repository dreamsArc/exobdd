<?php require_once './utils/header.php'; ?>
<section>
    <h2>Répertoire de vos films</h2>

    <?php
    if (isset($_GET['update']) && $_GET['update'] == 'ok') {
        echo '<p>Film Modifié</p>';
    }
    if (isset($_GET['update']) && $_GET['update'] == 'error') {
        echo '<p>Une erreur est arrivé</p>';
    }
    if (isset($_GET['delete']) && $_GET['delete'] == 'ok') {
        echo '<p>Film Supprimé</p>';
    }
    if (isset($_GET['delete']) && $_GET['delete'] == 'error') {
        echo '<p>Une erreur est arrivé</p>';
    }
    ?>

    <ul>
        <?php
        $query = $bdd->prepare('SELECT * FROM film');
        $query->execute();
        $films = $query->fetchAll();
        foreach ($films as $film) {
            echo '<li>' . $film['titre'] . '<a href="/pages/movie.php?id=' . $film['id'] . '">+</a></li><a href="/pages/update.php?id=' . $film['id'] . '">&#10000;</a><a href="/utils/delete.php?id=' . $film['id'] . '">&#10006;</a>';
        }
        ?>
    </ul>
</section>
<section class="button">
    <a href="pages/add.php">Ajouter un film</a>
</section>
<?php require_once './utils/footer.php'; ?>