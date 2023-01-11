<?php
require 'config/init.php';

include 'components/Head.html';

if (isset($_POST['submit'])) {
    if (!(empty($_POST['titre']) || empty($_POST['description']))) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $requete = "INSERT INTO produits (titre, description) VALUES ('$titre', '$description')";
        $rq = $pdo->prepare($requete);
        $rq->execute();
        echo 'Le produit a bien été envoyé à la base de données !';
    } else {
        echo 'faus remplir tout les champs  !';
    }
}

?>

    <title>creer</title>
    
<?php
include 'components/Header.php';
?>
<div style="margin: 20px;">
    <form action="creer.php" method="POST">
        <label for="Titre">Titre :</label>
        <input type="text" name="titre">
        <br>
        <label for="description">Description :</label>
        <br>
        <textarea name="description" cols="20" rows="10"></textarea>
        <br>
        <input type="submit" name="submit" value="Créer">
    </form>
</div>

<?php
include 'components/Footer.html';
?>