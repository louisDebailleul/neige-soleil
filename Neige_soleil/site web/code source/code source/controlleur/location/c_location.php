<?php 

	   $nbMessageParPage= 10.00;
        $db = App::getDatabase();
    
		$maxPrix = $db->query("SELECT max(prixS) as max FROM  location")->fetch(PDO::FETCH_OBJ);
		$minPrix = $db->query("SELECT min(prixS) as min  FROM  location")->fetch(PDO::FETCH_OBJ);
       $nbdelocation = $db->query("SELECT count(*) as nbLocation from location")->fetch();

        $nblocation =floatval($nbdelocation->nbLocation);
        $nbPage= ceil($nblocation/$nbMessageParPage);

        $prixMax = $maxPrix->max;
        $prixMin = $minPrix->min;
    
	
		// valeur des champs de cherche par defaut 
		$ville ="";
		$place="2";
		$chambre="1";
		$prixMin = $minPrix->min ;
		$prixMax =  $maxPrix->max ;

        if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
        {
            $pageActuelle=intval($_GET['page']);

            if($pageActuelle>$nbPage) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
            {
                $pageActuelle=$nbPage;
            }
        }
        else // Sinon
        {
            $pageActuelle=1; // La page actuelle est la n°1    
        }

      $premiereEntree=($pageActuelle-1)*$nbMessageParPage;


	if(isset($_GET['rech']))
	{
		// mais si Post on change les valeur par defaut   	
		$villeORvallee = $_GET['ville'];
    
		$place = $_GET['place'];
        $dateD = $_GET['dateD'];
        $dateF = $_GET['dateF'];
        $chambre = $_GET['chambre'];
		$prixMin = $_GET['Pmin'];
		$prixMax = $_GET['Pmax'];
        
        if(!empty($ville)){
                     $nbdelocation = $db->query("SELECT *  FROM location l , datelocation d
										where l.idL = d.id_location
                                        and libre = 'libre'
                                         and dateJour between '$dateD' and '$dateF'
                                        and ville = '$ville'
                                        or vallee = '$ville'
										and chambre >= $chambre
										and place >= $place
										and prixS between $prixMin
										and $prixMax ")->fetchAll();
            
            $allLocation = $db->query("SELECT * FROM location l , datelocation d
										where l.idL = d.id_location
                                        and libre = 'libre'
                                         and dateJour between '$dateD' and '$dateF'
                                        and ville = '$ville'
                                        or vallee = '$ville'
										and chambre >= $chambre
										and place >= $place
										and prixS between $prixMin
										and $prixMax 
                                        ORDER BY idL DESC LIMIT $premiereEntree, $nbMessageParPage ")->fetchAll();
           
        }else{
          
            $allLocation = $db->query("SELECT * FROM location l , datelocation d
										where l.idL = d.id_location
                                        and libre = 'libre'
                                        and dateJour between '$dateD' and '$dateF'
                                        and ville = '$ville'
                                        or vallee = '$ville'
										and chambre >= $chambre
										and place >= $place
										and prixS between $prixMin
										and $prixMax 
                                        ORDER BY idL DESC LIMIT $premiereEntree , $nbMessageParPage ")->fetchAll();
            
             $nbdelocation = $db->query("SELECT * FROM location l , datelocation d
										where l.idL = d.id_location
                                        and libre = 'libre'
                                         and dateJour between '$dateD' and '$dateF'
                                        and ville = '$ville'
                                        or vallee = '$ville'
										and chambre >= $chambre
										and place >= $place
										and prixS between $prixMin
										and $prixMax ")->fetchAll();
            
        }
        
     
			
			
			


	}else{

  //recupere toute les location avec la fonction query(requete, si des paramettre)
		$allLocation = $db->query("SELECT * FROM location ORDER BY idL DESC LIMIT ".$premiereEntree.", ".$nbMessageParPage." ")->fetchAll();
		
	}
    
	// on donne le nombre de resulta trouver 


	$recherche = "<p>";
	$recherche .="nombre de location trouver <span class='colorTextRed'>". $nbdelocation->nbLocation."</span></p>";

$AfficheNbpage = "<p align='center'>Page : "; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nbPage; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
        $AfficheNbpage .=" [ ".$i." ] "; 
     }	
     else //Sinon...
     {
         $AfficheNbpage .=  ' <a href="?p=location&page='.$i.'">'.$i.'</a> ';
     }
}
$AfficheNbpage .=  '</p>';

	include('vue/location/location.php');
?>