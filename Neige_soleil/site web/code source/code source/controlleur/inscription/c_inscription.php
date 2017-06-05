<?php 


$lesErreur="";
$succes="";

$pseudo="";
$prenom="";
$nom="";
$password="";
$passwordConfime="";
$email="";
$confirmation="";
$ville="";
$adresse="";
$codeP="";
$tel="";
if(isset($_POST['inscription'])){

	
	
	$prenom = $_POST['prenom'];
	$nom=$_POST['nom'];
	$password=$_POST['password'];
	$passwordConfime=$_POST['passwordConfime'];
	$email=$_POST['email'];
    $confirmation=$_POST['emailConfirme'];
    $ville=$_POST['ville'];
    $adresse=$_POST['adresse'];
    $codeP=$_POST['codeP'];
    $tel=$_POST['tel'];
    $typeInscription = $_POST['type'];

	if($password != $passwordConfime){
      $lesErreur .= "<span>Les mots de passe ne sont pas identique.<span><br>";
	}
	
	if(preg_match('/[^a-zA-Z0-9_]/', $prenom))
	{
		$lesErreur .= 'Seul les caractères alpha-numérique sont autorisés(Prenom)<br>';
	}
	
	if(preg_match('/[^a-zA-Z0-9_]/', $nom))
	{
		$lesErreur .= 'Seul les caractères alpha-numérique sont autorisés(Nom)<br>';
	}
	
	if(preg_match('/[^a-zA-Z0-9_]/', $pseudo))
	{
		$lesErreur .= 'Seul les caractères alpha-numérique sont autorisés(Pseudo)<br>';
	}
	
	if (preg_match("/[a-zA-Z0-9-.]+@[a-zA-Z0-9-.]+/", $email)){
	
	}
	else {
		$lesErreur .= 'Format invalide (Email)';
	}
	
	if(strlen($password) < 5) {
		$lesErreur .="<span>Le mot de passe doit faire plus que 5 carractère.<span><br>";
	}

	if($email != $confirmation){
		$lesErreur .="<span>Les email ne sont pas identique<span><br>";
	}

 $db = App::getDatabase();

 $mail = $db->query("SELECT * FROM client where email = '$email' ")->fetch(PDO::FETCH_OBJ);


 if($mail != false){
 	 $lesErreur .="<span>L'adresse mail exsite déjà<span><br>";
 }
 
 if ($lesErreur =="") {
     
     if($typeInscription == 'Locataire' ){
          $db->query("INSERT INTO client SET nom = ?, password = md5(?),prenom = ?, email = ? , ville= ? ,adresse = ? , codeP = ? ,tel = ? ", [
            $nom,
            $password,
            $prenom, 
            $email,
            $ville,
            $adresse,
            $codeP,
            $tel           
                ]);
         $succes = "<span> votre compte proprietair a bien etait créer.</span><a class='submit' href='?p=home' >Retour à l'acceuil</a><br>";
     }else{
     
           $db->query("INSERT INTO proprietair SET nom = ?, password = md5(?),prenom = ?, email = ? , ville= ? ,adresse = ? , codeP = ? ,tel = ? ", [
            $nom,
            $password,
            $prenom, 
            $email,
            $ville,
            $adresse,
            $codeP,
            $tel           
            ]);
     }
 	 $succes = "<span> votre compte proprietair a bien etait créer.</span><a class='submit' href='?p=home' >Retour à l'acceuil</a><br>";
 }


}

	include('vue/inscription/inscription.php');
?>