<?php
 
require 'config/init.php';

include 'components/Head.html';






 
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])){
 
		// VARIABLE
 
		$name       = $_POST['name'];
		$email        = $_POST['email'];
		$mot_de_passe     = $_POST['mot_de_passe'];
		
 
		// TEST SI mot_de_passe = mot_de_passe CONFIRM
 
	/* 	if($mot_de_passe != $pass_confirm){
				header('Location: index.php?error=1&pass=1');
					exit();
 
		} */
 
        
		// TEST SI EMAIL UTILISE
        $requete = "SELECT count(*)  FROM user WHERE email = '$email'";
		$req = $pdo->prepare($requete);
		$req->execute();

        
 
		$rq = $req->fetchAll();

        $rq=$rq[0];
			
        if($email_verification['numberEmail'] != 0) {
			 header('location: index.php?error=1&email=1');
				exit(); 
 			
		
 
		 // HASH
 		$secret = sha1($email).time();
		$secret = sha1($secret).time().time(); 
 
		// CRYPTAGE DU mot_de_passe
 		 $mot_de_passe = "aq1".sha1($mot_de_passe."1254")."25"; 
 
		// ENVOI DE LA REQUETE
         $requete= "INSERT INTO user(name, email, mot_de_passe) VALUES('$name','$email','$mot_de_passe')"; 
 		$req = $pdo->prepare($requete);
		$req->execute();
            }	

            }
?>

    <title>inscription</title>
    
<?php
include 'components/Header.php';
?>
<div id="form">
	<form method="POST" action="inscription.php">
				<table>
					<tr>
						<td>name</td>
						<td><input type="text" name="name" placeholder="Ex : Nicolas" required></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="mot_de_passe" placeholder="Ex : ********" required ></td>
					</tr>
					
				</table>
				<div id="button">
					<button type='submit'>Inscription</button>
				</div>
			</form>
            </div>

<?php
include 'components/Footer.html';
?>