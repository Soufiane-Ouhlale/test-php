<?php
    require 'config/init.php';

if (isset($_POST['delete'])){

    $id = $_POST['id_produit'];
    
$request="DELETE FROM produits WHERE id_product='$id'";

$req = $pdo->prepare($request);



$req->execute();


}


?>