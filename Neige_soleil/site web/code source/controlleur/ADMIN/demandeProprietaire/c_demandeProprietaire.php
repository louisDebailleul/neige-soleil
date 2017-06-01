<?php 


	$bd = App::getDatabase();


	 $negociation = $bd->query('SELECT *  FROM demandeproprio d , location l ,proprietair p
	                         where  d.location_id = l.idL 
	                         and    d.proprietair_id = p.id
	                         and  etat = "negociation" ')->fetchAll();


	$attSignature = $bd->query('SELECT *  FROM demandeproprio d , location l ,proprietair p
	                         where  d.location_id = l.idL 
	                         and    d.proprietair_id = p.id
	                         and  etat = "attSignature" ')->fetchAll();

	$signer = $bd->query('SELECT *  FROM demandeproprio d , location l ,proprietair p
	                         where  d.location_id = l.idL 
	                         and    d.proprietair_id = p.id
	                         and  etat = "signer" ')->fetchAll();

$rejeter = $bd->query('SELECT *  FROM demandeproprio d , location l ,proprietair p
	                         where  d.location_id = l.idL 
	                         and    d.proprietair_id = p.id
	                         and  etat = "rejeter" ')->fetchAll();

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

	include "vue/ADMIN/demandeProprietaire/demandeProprietair.php"

?>



