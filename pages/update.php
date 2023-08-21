<?php
require_once '../utils/header.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = $bdd->prepare('SELECT * FROM film WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $film = $query->fetch();
    if (!empty($film)) {
        if (isset($_POST['titre']) && !empty($_POST['titre'])) {
            $titre = $_POST['titre'];
            $dure = $_POST['dure'];
            $genre = $_POST['genre'];
            $resume = $_POST['resume'];
            $jaquette = $_POST['jaquette'];
            $query = $bdd->prepare('UPDATE film SET titre = :titre, durée = :dure, genre = :genre, resume = :resume, jaquette = :jaquette WHERE id = :id');
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            if (!empty($dure)) {
                $query->bindValue(':dure', $dure, PDO::PARAM_INT);
            } else {
                $query->bindValue(':dure', null, PDO::PARAM_NULL);
            }
            if (!empty($genre)) {
                $query->bindValue(':genre', $genre, PDO::PARAM_STR);
            } else {
                $query->bindValue(':genre', null, PDO::PARAM_NULL);
            }
            if (!empty($resume)) {
                $query->bindValue(':resume', $resume, PDO::PARAM_STR);
            } else {
                $query->bindValue(':resume', null, PDO::PARAM_NULL);
            }
            if (!empty($jaquette)) {
                $query->bindValue(':jaquette', $jaquette, PDO::PARAM_STR);
            } else {
                $query->bindValue(':jaquette', null, PDO::PARAM_NULL);
            }
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            header('Location: /index.php?update=ok');
        }
    } else {
        header('Location: /index.php?update=error');
    }
}
?>

<section>
    <h2>Modifier un film</h2>
    <form action="#" method="post">
        <input type="text" name="titre" id="titre" placeholder="Titre du film" value="<?php echo $film['titre']; ?>">
        <input type="number" name="dure" id="dure" placeholder="Durée (en min)" value="<?php echo $film['durée']; ?>">
        <input type="text" name="genre" id="genre" placeholder="Genre" value="<?php echo $film['genre']; ?>">
        <textarea name="resume" id="resume" cols="30" rows="10" placeholder="Résumer du film"><?php echo $film['resume']; ?></textarea>
        <input type="file" name="jaquette" id="jaquette" value="<?php echo $film['jaquette']; ?>">
        <input type="submit" value="Modifier">
    </form>
</section>

<?php require_once '../utils/footer.php'; ?>