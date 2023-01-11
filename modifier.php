<?php

require 'config/init.php';


 if (isset($_POST['modifier'])){

  $titre = $_POST['titre'];
  $description = $_POST['description'];
  $id = $_POST['id_produit'];

$request = "UPDATE produits SET titre='$titre', description='$description' WHERE id_product='$id'";

$req= $pdo->prepare();


$req->execute();

 }


?>


