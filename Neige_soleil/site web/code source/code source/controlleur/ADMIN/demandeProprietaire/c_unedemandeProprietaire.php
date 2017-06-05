<?php 

$id = $_GET['id'];
var_dump($id);
$bd= App::getDatabase();

$unedemande = $bd->query("SELECT *  FROM demandeproprio d , location l ,proprietair p
	                         where  d.location_id = l.idL 
	                         and    d.proprietair_id = p.id
	                         and  idD = ".$id." ")->fetch();
$location = $bd->query(" SELECT * FROM location where idL = ".$unedemande->location_id." ")->fetch();



$lesPhotos = explode(',', $location->photos);
$nbPhoto = count($lesPhotos);
var_dump($unedemande);

if($unedemande->etat == 'negociation'){

	$descriptif = $unedemande->detail;
	$prixS = $unedemande->prixS;
	$idLocation = $unedemande->idL;


	if(!empty($_POST['Valider'])){

		
		$descriptif = $_POST['descriptif'];
		$prixS = $_POST['prixS'];
		
		

	$bd->query("UPDATE location set  detail = '".$descriptif."', prixS = ".$prixS." 
	WHERE idL = ".$idLocation." ");

	$bd->query("UPDATE demandeProprio set etat = 'attSignature' 
			where idD = ".$id." ");

	}

	if(!empty($_POST['rejeter'])){

		$bd->query("UPDATE demandeProprio set etat = 'rejeter' 
			where idD = ".$id." ");
	}

	include "vue/ADMIN/uneDemandeProprioNegociation.php";

}elseif($unedemande->etat == 'attSignature') {
    
    if(!empty($_POST['signer'])){
        if(!empty($_POST['dateSignature'])){
            $dateD=$_POST['dateSignature'];
            $bd->query("UPDATE demandeProprio set etat = 'signer' 
			where idD = ".$id." ");
            $bd->query("INSERT INTO contratProprio ('location_id','proprietair_id','dateD','etat')
            values(".$unedemande->location_id.",".$unedemande->proprietair_id.",'".$dateD."','signer' ");
            $bd->query("UPDATE location set etat = 'signer' 
			where idL = ".$unedemande->location_id." ");
        }else{
            $erreur = 'informet le champs date.';
        }
    }
    if(!empty($_POST['renvoisNegosiation'])){
        
        $bd->query("UPDATE demandeProprio set etat = 'negociation' 
        where idD = ".$id." "); 
    }
    if(!empty($_POST['relancer'])){
      
    }
    if(!empty($_POST['rejeter'])){
        $bd->query("UPDATE demandeProprio set etat = 'rejeter' 
        where idD = ".$id." ");
    }
      
    

	include "vue/ADMIN/demandeProprietaire/uneDemandeProprioAttSignature.php";
	
}elseif($unedemande->etat == 'signer') {
    
    $dateContrat = $bd->query("select dateD from contratProprio where location_id= ".$unedemande->location_id."
    and proprietair_id = ".$unedemande->proprietair_id."  ")->fetch();
    
     $dateC = date('d-m-Y ', $dateContrat['dateD']);

	include "vue/ADMIN/demandeProprietaire/uneDemandeProprioSigner.php";	
}
?>

