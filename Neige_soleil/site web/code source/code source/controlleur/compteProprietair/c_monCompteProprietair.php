<?php 

class MonCompte {

	
}
if(empty($_SESSION)){
	  header("Location: /public/ppeLouis/?p=home");
  exit();
}
    $db = App::getDatabase();
    $user = $db->query("SELECT * FROM proprietair where id = $id ")->fetch(PDO::FETCH_OBJ);

     

	include('vue/compteProprietair/monCompteProprietair.php');
?>