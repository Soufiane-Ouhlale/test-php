
<?php

require 'config/init.php';

if(isset($_SESSION['connect'])){
  if($_SESSION['connect'] === true){

      header('location: index.php');

  }
    

}

include 'components/Head.html';


if (isset($_POST['submit'])){

if(!empty($_POST['email']) && !empty($_POST['mot_de_passe'])){

	// VARIABLES
	$email 		= $_POST['email'];
	$mot_de_passe 	= $_POST['mot_de_passe'];
    $error= 0;


	

	// CRYPTER LE mot_de_passe
	  $mot_de_passe = "aq1".sha1($mot_de_passe."1254")."25"; 

	
     

    $requete = "SELECT * FROM user WHERE email = ?";
	$req = $pdo->prepare($requete);
	$req->execute(array($email));


 
	while($user = $req->fetch()){

		if($mot_de_passe == $user['mot_de_passe']){
            $error=0;
            $_SESSION['connect']= true;

           
            
          
         header('location: connexion.php?success=1');

		 echo "connecté";
         exit;
        }

        if($error == 1){

            header('location: index.php?error=1');

            exit;
        }
        
    }

   
     
}

}



    ?>



    <title>connexion</title>
    
<?php
include 'components/Header.php';
?>



<p id="info">Bienvenue sur mon site,si vous n'êtes pas inscrit, <a href="inscription.php">inscrivez-vous.</a></p>

<?php
		if(isset($_GET['error'])){
		 
				if(isset($_GET['mot_de_passe'])){
					echo '<p id="error">Les mots de passe ne correspondent pas.</p>';
				}
				else if(isset($_GET['email'])){
					echo '<p id="error">Cette adresse email est déjà utilisée.</p>';
				}
			}
			else if(isset($_GET['success'])){
				echo '<p id="success">Inscription prise correctement en compte.</p>';
			}
		?>

<div id="form">
			<form method="POST" action="connexion.php">
				<table>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="mot_de_passe" placeholder="Ex : ********" required ></td>
					</tr>
				</table>
				<p><label><input type="checkbox" name="connect" checked>Connexion automatique</label></p>
				<div id="button">
					<input type="submit" name="submit" value="Connexion">
				</div>
			</form>
		</div>





    <?php
include ('components/Footer.html');
?>