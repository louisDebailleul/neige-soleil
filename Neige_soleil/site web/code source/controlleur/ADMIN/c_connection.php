<?php 

if (isset($_GET['deconnection'])) {
	  session_unset();
}


	  //connection admin

	$nom = "";
	$passwordAdmin = "";
	$adminErreur="";

	if(isset($_POST['admin'])){

		$nom = $_POST['nom'];
		$passwordAdmin = $_POST['motPasse'];

		 $db = App::getDatabase();
		$admin = $db->query("SELECT * FROM admin where nom = '$nom' and password = MD5('$passwordAdmin') ")->fetch(PDO::FETCH_OBJ);
		 
		if($admin!= false){
			$_SESSION['id']= $admin->idC;
			$_SESSION['admin']= $admin->nom;
		      header('Location: ?p=monNeigeEtSoleil');
              exit();
		   
		}else{
			 $adminErreur = "<span> Mot de passe ou nom incorrect <span>"; 	
		}

	}	

	include('vue/ADMIN/login.php');
	


?>