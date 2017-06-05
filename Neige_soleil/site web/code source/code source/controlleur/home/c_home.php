
<?php 


        $db = App::getDatabase();
    
		$maxPrix = $db->query("SELECT max(prixS) as max FROM  location")->fetch(PDO::FETCH_OBJ);
		$minPrix = $db->query("SELECT min(prixS) as min  FROM  location")->fetch(PDO::FETCH_OBJ);
        $nblocation = $db->query("SELECT count(*) as nbLocation from location")->fetch();

        

        $prixMax = $maxPrix->max;
        $prixMin = $minPrix->min;
    
	
		// valeur des champs de cherche par defaut 
		$ville ="";
		$place="2";
		$chambre="1";
		$prixMin = $minPrix->min ;
		$prixMax =  $maxPrix->max ;

require "vue/home/home.php";

?>