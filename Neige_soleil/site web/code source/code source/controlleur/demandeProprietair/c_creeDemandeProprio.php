<?php


         //on inisialise les variable poster pour garder 
         //les valeur si une erreur de sésis apres un poste 
	            $Nom = "";
				$chambre = "";
				$place = "";
				$ville = "";
				$codeP = "";
				$vallee = "";
				$prixJ = "";
				$prixS = "";
				$adresse = "";
		 		$detail = "";
		 		$douche = "";
		 	
                $statut = "negociation";
		 	    $erreur="";
		 	    $susses="";

		 	       $tab= array();

if(isset($_POST['submit'])){

	$bd = App::getDatabase();

	$idPro = $_SESSION['id'];

	var_dump($idPro);
    // si e nom et prenom du proprieter est bon on donne les valeur du post 
    if(!empty($idPro)){
 
		$Nom = $_POST['nom'];
		$chambre = $_POST['chambre'];
		$place = $_POST['place'];
		$ville = $_POST['ville'];
		$adresse = $_POST['adresse'];
		$codeP = $_POST['codePostal'];
		$vallee = $_POST['vallee'];
		$prixJ = $_POST['prixJ'];
		$prixS =$_POST['prixS'];
 		$detail = $_POST['descriptif'];
 		$douche =$_POST['douche'];
 		$dateDebut = $_POST['dateD'];
 		$dateFin = $_POST['dateF'];
     
       

     	
       
		require 'function/function.php';
                                                                    // gestion des photos
		$chemin = 'img/chalets';
		// rondom() cree une chaine de carartère aléatoire
		$chaine = random(5);
		$lesFiles = reArrayFiles($_FILES['img']);
		$nbPhoto = count($lesFiles);
		for ($i=0 ; $i < $nbPhoto; $i++) { 

			$name =  $lesFiles[$i]["name"];
			// on explode le nom de la photo "photo.jpg"
			$name =	explode('.', $name);
			$name[0] .= $chaine."".$i;
			// qui de vien "photo + chaine + $i puis on l'implode pour lui redonner .jpg"
			$newName =  implode(".", $name );
			$tab[] = $newName;
			// on l'enregistre dans le dossier img/chalets
			move_uploaded_file($lesFiles[$i]["tmp_name"], "$chemin/$newName");

		}
		//on crée une chaine avec toute les photos
		$lesPhotos = implode(",", $tab);
		

	
		$bd->query("INSERT INTO location (Nom,chambre,place,ville,adresse,codeP,vallee,prixJ,prixS,photos,detail,douche,locataire_id,statut)
		 values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)",[$Nom,$chambre,$place,$ville,$adresse,$codeP,$vallee,$prixJ,$prixS,$lesPhotos,$detail,$douche,$idPro,$statut]);
	// geston des date de location	




		$derniereLocation = $bd->query("SELECT max(idL)as idMax FROM location")->fetch();
		// on trensforme les date en time ex "21332232"
         $timeDebut = strtotime($dateDebut);
          $timeFin = strtotime($dateFin);
          $unjour = 86400;
         $tabDate= array( );
          $i = 0;
          // on les enregistres dans un tableau 
          while ($timeDebut <= $timeFin) {
      
          $timeDebut = $timeDebut + $unjour;
          	$tabDate[$i] =   $timeDebut;
          	$i++;
           }
   

          $nbDate = count($tabDate);
          $idLocation = $derniereLocation->idMax;
          $requete = "";
        // on les insert dans la table dateloction
     for ($i=0; $i < $nbDate ; $i++) { 
     		$laDate = date('Y-m-d ', $tabDate[$i]);
     		  
     		  if($i == 0){
     		  	 
     		  	 $requete .= "INSERT INTO datelocation (idD,datejour,libre,id_location,id_saison ) values('','".$laDate."','libre',".$idLocation.",6),";
     		  	 
     		 }else if($i == $nbDate-1){
     		 	 $requete .= "('','".$laDate."','libre',".$idLocation.",6 );";
     		  }else{
     		
     		  	 $requete .= "('','".$laDate."','libre',".$idLocation.",6 ),";
     		  }
      }
      
     	$bd->query($requete);
      // on donne la bonne id de saison au champ id_saison de datelocation;
        $lesSaison = $bd->query("SELECT * FROM saison")->fetchall();
     
     		   
     		   foreach ($lesSaison as $uneSaison) {
     		   	  $requete = "update datelocation set id_saison = ".$uneSaison->idS." 
     		   	  where dateJour BETWEEN '".$uneSaison->dateDebut."' and '".$uneSaison->dateFin."'
     		   	  and id_location = ". $idLocation." ";
     		   	
     		   	  $bd->query($requete);
     		   }
     	
        $bd->query("INSERT INTO demandeProprio (idD,proprietair_id,location_id,etat) values('','".$idPro."','".$idLocation."','".$statut."')");

		$susses="la location a bien etait enregistrer.";
    }else{
		$erreur = "Le locataire n'a pas etait trouver.";
	}
}
				




	












include('view/demandeProprietair/creeDemandeProprio.php');

?>