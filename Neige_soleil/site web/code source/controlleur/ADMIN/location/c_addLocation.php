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
		 		$nomLocataire = "";
		 	    $prenomLocataire = "";

		 	    $erreur="";
		 	    $susses="";


if(isset($_POST['submit'])){

    
      $lesPost = securiter($_POST);
if( $lesPost == true){
      $bd = App::getDatabase();
    
	// on recupère l'id du locataire pour lier la table locataire a location
	$nomLocataire = $_POST['nomLocataire'];
	$prenomLocataire = $_POST['prenomLocataire'];
    $idLocataire = $bd->query("SELECT * FROM proprietair where nom = ? and prenom = ?",[$nomLocataire,$prenomLocataire])->fetch();   
    
    

    // si e nom et prenom du proprieter est bon on donne les valeur du post 
  if($idLocataire != false){
 
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
		$locataire = $idLocataire->id;
 	
     
     	
       
		
                                                                    // gestion des photos
		
      $lesFiles = reArrayFiles($_FILES['img']);
	    $lesPhotos = addimg($lesFiles,'img/chalets');
      
      if($lesPhotos !=false){
                    $bd->query("INSERT INTO location (Nom,chambre,place,ville,adresse,codeP,vallee,prixJ,prixS,photos,detail,douche,locataire_id)
                     values(?,?,?,?,?,?,?,?,?,?,?,?,?)",                                [$Nom,$chambre,$place,$ville,$adresse,$codeP,$vallee,$prixJ,$prixS,$lesPhotos,$detail,$douche,$locataire]);


            $derniereLocation = $bd->query("SELECT max(idL)as idMax FROM location")->fetch();
            // on trensforme les date en time ex "21332232"
            $annee = date('Y');
            $dateDebut =''.$annee.'/09/01';
            $dateFin = ''.$annee+1 .'/08/01';
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

                                 $requete .= "INSERT INTO datelocation (idD,datejour,libre,id_location,id_saison )                                    values('','".$laDate."','libre',".$idLocation.",6),";

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



                $susses="la location a bien etait enregistrer.";
          
      }else{
         $erreur = '<span> la photo dois etre du forma jpg, png </span>';
      }
    
    
	
	// geston des date de location	



				

      }else{
        $erreur .='<span> Le proprietair est introuvable </span>';
      }
      }else{
      $erreur .= $lesPost;
      }
	


}







include "vue/ADMIN/location/addLocation.php";

?>



