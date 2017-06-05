<?php

$bd = App::getDatabase();

$annee = date('Y');

$lesStationsAigues= $bd->query(" SELECT * FROM station s, infosaison i where vallee = 1
                                and s.idS = i.station_id 
                                and  annee = '$annee' ")->fetchall();

  
 
$Ceillac = $bd->query("SELECT * FROM station s, infosaison i where vallee = 2
                          and s.idS = i.station_id 
                                and  annee = '$annee' ")->fetchall();

$arvieux = $bd->query("SELECT * FROM station s, infosaison i where vallee = 3  
                       and s.idS = i.station_id 
                       and  annee = '$annee' " )->fetchall();

$Guil = $bd->query(" SELECT * FROM station s, infosaison i where vallee = 4
                    and s.idS = i.station_id 
                    and  annee = '$annee' ")->fetchall();


	include('vue/station/station.php');
?>