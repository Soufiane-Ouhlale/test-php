<?php
 
require 'config/init.php';

include 'components/Head.html';



?>

    <title>Home</title>
    
<?php
include 'components/Header.php';
?>

<?php

include './functions/Card.php';

$requete = "SELECT * FROM produits";
$rq = $pdo->prepare($requete);
$rq->execute();

$resultats = $rq->fetchAll(PDO::FETCH_ASSOC);


foreach ($resultats as $r) {
    card($r['image'], $r['titre'], $r['description'], $r['id_produit']);

   
    
}
?>


<?php
include 'components/Footer.html';
?>


