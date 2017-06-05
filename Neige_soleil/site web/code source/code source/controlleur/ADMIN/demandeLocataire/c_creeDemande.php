<?php 


	$nomLocataire = "";
	$prenomLocataire = "";
	$emailLocataire = "";
	$tel = "";
	$ville = "";
	$adresse = "";
	$codeP = "";
	$nomLocation = "";
	$dateD = "";
	$dateF = "";
	$message = "";



if(isset($_POST['envoyer'])){

	$nomLocataire = $_POST['nomLocataire'];
	$prenomLocataire = $_POST['prenomLocataire'];
	$emailLocataire = $_POST['emailLocataire'];
	$tel = $_POST['tel'];
	$ville = $_POST['ville'];
	$adresse = $_POST['adresse'];
	$codeP = $_POST['codeP'];
	$nomLocation = $_POST['nomLocation'];
	$dateD = $_POST['dateD'];
	$dateF = $_POST['dateF'];
	$message = $_POST['message'];
    $idclient = null;

	$bd = App::getDatabase();

	$bd->query(" INSERT INTO client
	 set  nom = ? , prenom = ?, email = ?,ville = ?, adresse = ?, codeP = ?, tel = ?",
	 [
	 $nomLocataire,
	 $prenomLocataire,
	 $emailLocataire,
	 $ville,
	 $adresse,
	 $codeP,
	 $tel
	 ] );

    $idLocataire = $bd->query(" SELECT idC from client 
    	                  WHERE nom = '".$nomLocataire."' AND prenom = '".$prenomLocataire."'")->fetch();


    $idLocation = $bd->query("SELECT idL from location
    	                  where nom = '".$nomLocation."'
    	                  ")->fetch();

   $dateAujourdHui=date('Y-m-d ', time());
   $confirme = "attAcompte";

    $bd->query("INSERT INTO demande set dateD = ?, dateF = ?, confirme = ?,location_id = ? ,client_id = ?, dateDemande = ? "
    , [ $dateD,
        $dateF,
        $confirme,
        $idLocation->idL,
        $idLocataire->idC,
        $dateAujourdHui
        ]);

    $bd->query("UPDATE datelocation set libre = 'reserver'
    	   WHERE dateJour between '".$dateD."' and '".$dateF."'
    	   And id_location = ".$idLocation->idL." ");

}




	include "vue/ADMIN/demandeLocataire/creeDemande.php"

?>