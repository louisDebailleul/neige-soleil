<?php 

class MonCompte {

	
}
if(empty($_SESSION)){
	  header("Location: /public/ppeLouis/?p=home");
  exit();
}
    $db = App::getDatabase();
    $user = $db->query("SELECT * FROM client where idC = $id ")->fetch(PDO::FETCH_OBJ);

     

	include('vue/monCompteLocataire/monCompte.php');
?>