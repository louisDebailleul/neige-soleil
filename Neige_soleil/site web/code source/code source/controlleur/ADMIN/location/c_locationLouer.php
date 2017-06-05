
<?php 

$db = App::getDatabase();

$resultatsAll = $db->query('SELECT * FROM location_Louer louer ,location l, proprietair p 
                            where louer.id_location = l.idL
                            and  l.locataire_id = p.id')->fetchall();




  	include('vue/ADMIN/location/locationLouer.php');
?>