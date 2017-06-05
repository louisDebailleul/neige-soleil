<?php 


$annee = "";
$prixS="";
$prixJ="";
$nbPiste="";
$clients="";
$station="";
$erreur="";
$succes="";
    $bd = App::getDatabase();
   $lesStation= $bd->query("select nom,ids from station")->fetchall();

if(isset($_POST['ajouter'])){
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
        $bd->query("insert into infosaison values('' ,'".$annee."',".$prixS.",".$prixJ.",".$nbPiste.",".$clients.",".$station." ) ");
   
        $succes ='<span>La sationt a bien étés enregistrer</span>';
   }else{
     
        $erreur .= $securite;
  }
    
}


require 'vue/ADMIN/station/stationAnneadd.php';




?>