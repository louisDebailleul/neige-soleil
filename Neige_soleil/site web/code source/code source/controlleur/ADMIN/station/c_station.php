<?php

$bd = App::getDatabase();
$erreur="";
$succer="";
$annee = date('Y');

$lesStation = $bd->query("SELECT * FROM station s, infosaison i where 
                                s.idS = i.station_id 
                                and  annee = '$annee' ")->fetchall();


if(isset($_POST['supprimer'])){
            var_dump('coucou 54');
    $securite = securiter($_POST);
    if($securite == true ){
        $id = $_POST['supprimer'];
        $bd->query("DELETE FROM station WHERE ids  = $id ");
        $succer = "<span>La station a bien etait supprimer.</span>";
    }else{
        $erreur = $securite ;
    }
}

if(isset($_GET['vue'])){
    
    $vue = $_GET['vue'];
    if($vue=="touteAnnee"){
        if(isset($_POST['supprimer'])){
            $securite = securiter($_POST);
            if($securite == true ){
                $id = $_POST['supprimer'];
                $bd->query("DELETE FROM infosaison WHERE idI  = $id ");
                $succer = "<span>L'année a bien etait supprimer.</span>";
            }else{
                $erreur = $securite ;
            }
        }
        
        if(!empty($_GET['trie'])){
            $tri = $_GET['trie'];
            if($tri ="annee"){
                $lesStation = $bd->query("SELECT * FROM station s, infosaison i where 
                                s.idS = i.station_id ORDER BY annee  ")->fetchall();
            }elseif($tri="prix"){
                $lesStation = $bd->query("SELECT * FROM station s, infosaison i where 
                                s.idS = i.station_id ORDER BY prixS ")->fetchall();
            }elseif($tri="station"){
                $lesStation = $bd->query("SELECT * FROM station s, infosaison i where 
                                s.idS = i.station_id ORDER BY station ")->fetchall();
            } else{
                $lesStation = $bd->query("SELECT * FROM station s, infosaison i where 
                                s.idS = i.station_id ORDER BY clients ")->fetchall();
            }
                
        }else{
        
        $lesStation = $bd->query("SELECT * FROM station s, infosaison i where 
                                s.idS = i.station_id  ")->fetchall();
        }
        require "vue/ADMIN/station/stationTouteAnnee.php";
        
    }else{
        require "vue/ADMIN/station/station.php";
    }
}else{
    
require "vue/ADMIN/station/station.php";
}
?>