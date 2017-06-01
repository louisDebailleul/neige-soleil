<?php 


	$db = App::getDatabase();


	$uneDemande = $bd->query("SELECT * FROM demande d, client c , location l
							  where d.location_id = l.idL 
							  and d.client_id = c.idC
  							  and id = ".$id." ")->fetch();

	$dateLocation= $bd->query("SELECT * FROM datelocation d , saison s
		                      where d.id_saison = s.idS
		                       and dateJour between '".$uneDemande->dateD."' 
		                      and '".$uneDemande->dateF."'  
		                      and id_location = ".$uneDemande->location_id." ")->fetchall();


	$erreur="";
	$nbJour = count($dateLocation);
	$lesCoef = 0;
	foreach ($dateLocation as $uneDate) {

		if($uneDate->libre == "reserver"){
			$erreur .= "<span>".$uneDate->dateJour."</span><br>";
		}
	    $lesCoef = $lesCoef + $uneDate->coef ;
	}
	$coef = $lesCoef/$nbJour;
	$prix = $uneDemande->prixS;
	$prixSemaine = $prix * $coef;
	$acompte = round($prixSemaine * 0.20,2);
	$resteDue = round($prixSemaine - $acompte,2);

	$facture = "<ul>
	<li>Prix de base: ".round($prix, 2)."</li>
	<li>Coef saison: ".round($coef, 2)."</li>
	<li>Prix séjour: ".round($prixSemaine, 2)."</li>
	<li>Acompte due: ".round($acompte, 2)."</li>
	<li>Prix moins l'acompte: ".$resteDue."</li>
	</ul>";

	if($uneDemande->confirme == "attReponse"){
		
		if($erreur != "" ){
			$message ="<span>Les date suivante ne somt pas libre</span>".$erreur;
			$facture ="";
		}else{
			$message = "<span> toute les date sont libre </span>";
			
	
			if(!empty($_POST['envoyer'])){

				$messageEmail =$_POST['message'];
				$intituler = $_POST['intituler'];
				$reponse = $_POST['reponse'];
				$dateAujourdHui=date('Y-m-d ', time());

				if($reponse == "Positif"){
					$bd->query(" UPDATE demande 
								set confirme = 'attAcompte',dateDemande = '".$dateAujourdHui."' 
								where id = ".$id."  ");

					$bd->query("UPDATE datelocation set libre = 'reserver' 
					WHERE dateJour BETWEEN '".$uneDemande->dateD."' and '".$uneDemande->dateF."'
					and id_location = ".$uneDemande->location_id." ");

				}else if ($reponse == "Négatif"){
					$bd->query(" UPDATE demande 
								set confirme = 'annuler'
								 where id = ".$id."  ");
				}
		    }

		 

		}

		include "view/admin/demandeLocataire/unedemande_attReponse.php";

	}else if($uneDemande->confirme == "attAcompte"){

        $message = "<span> En attente d'un acompte de ".round($acompte,2)." </span>";
     
        if(!empty($_POST['envoyer'])){

				$messageEmail =$_POST['message'];
				$intituler = $_POST['intituler'];
				$cheque = $_POST['cheque'];
				$dateCheque = $_POST['dateCheque'];
			       var_dump($cheque);
			       var_dump($acompte);
				if($cheque == $acompte ){
						var_dump($_POST);

					$bd->query(" UPDATE demande 
								set confirme = 'reserver',dateDemande = '".$dateCheque."', acompte = '".$cheque."' 
								where id = ".$id."  ");
				}else {
					$erreur="<span> le chèque n'est pas au bon montant. </span>";
				}
		    }

		

		include "vue/ADMIN/unedemande_attAcompte.php";
	} else {

		include "vue/ADMIN/demandeLocataire/unedemande_detail.php";
	}



 
	

?>