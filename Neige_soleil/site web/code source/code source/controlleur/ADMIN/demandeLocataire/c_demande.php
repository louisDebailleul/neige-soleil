<?php 


	$bd = App::getDatabase();


	 $attAcompte = $bd->query('SELECT *  FROM demande d , location l ,client c
	                         where  d.location_id = l.idL 
	                         and    d.client_id = c.idC
	                         and  confirme = "attAcompte" ')->fetchAll();

	$reserver = $bd->query('SELECT *  FROM demande d , location l ,client c
	                         where  d.location_id = l.idL 
	                         and    d.client_id = c.idC
	                         and  confirme = "reserver" ')->fetchAll();

	$attReponse = $bd->query('SELECT *  FROM demande d , location l ,client c
	                         where  d.location_id = l.idL 
	                         and    d.client_id = c.idC
	                         and  confirme = "attReponse" ')->fetchAll();
     if (!empty($_GET['id'])) {
     	# code...
		$idDemande = $_GET['id'];
		$supprimer = $_GET['supprimer'];
		if($supprimer == "oui"){

			$laDemande = $bd->query("SELECT * FROM demande where id = ".$idDemande." ")->fetch();

			$bd->query("UPDATE datelocation set libre = 'libre'
			where datejour between '".$laDemande->dateD."' and '".$laDemande->dateF."'
			and id_location = ".$laDemande->location_id." ");

			$bd->query("DELETE from demande where id = ".$idDemande." ");
		}
     }

	include "vue/ADMIN/demandeLocataire/demande.php";

?>



