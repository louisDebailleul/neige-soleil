<?php
$bd = App::getDatabase();
$id = $_GET['id'];
$uneAnnee = $bd->query("select * from infosaison where idI = $id ")->fetch(); 

$annee = $uneAnnee->annee;
$prixS= $uneAnnee->prixS;
$prixJ= $uneAnnee->prixJ;
$nbPiste= $uneAnnee->nbPiste;
$clients= $uneAnnee->clients;
$station= $uneAnnee->station_id;
$erreur="";
$succes="";
   $lesStation= $bd->query("select nom,ids from station")->fetchall();

if(isset($_POST['modifier'])){
    $securite = securiter($_POST);
  if($securite == 'true'){
   
        $annee = $_POST['annee'];
        $prixS=$_POST['prixS'];
        $prixJ=$_POST['prixJ'];
        $nbPiste=$_POST['nbPiste'];
        $clients=$_POST['clients'];
        $station=$_POST['station'];
         
                        foreach($lesStation as $uneStation){
                           if( $station == $uneStation->nom  ){
                                $station = $uneStation->ids ;
                           }
                         }
        $bd->query(" update infosaison set annee = '".$annee."',
                                           prixS = ".$prixS.",
                                           prixJ = ".$prixJ.",
                                           nbPiste = ".$nbPiste.",
                                           clients = ".$clients.",
                                           station_id = ".$station."
                                           where idI = $id  ");
   
        $succes ='<span>La sationt a bien étés modifier.</span>';
   }else{
     
        $erreur .= $securite;
  }
    
}


require "vue/ADMIN/station/updateAnnee.php";
?>