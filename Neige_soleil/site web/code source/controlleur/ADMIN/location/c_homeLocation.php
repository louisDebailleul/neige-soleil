
<?php 



    $susses = "";
    $db = App::getDatabase();
   
	$resultatsAll = $db->query('SELECT * FROM location ')->fetchall();
     
	if (isset($_POST['supprimer'])) {
		$id = $_POST['supprimer'];
        
        $lesPhotos = $db->query("SELECT * from location where idL = ".$id." ")->fetch();
        
        $tabPhoto = explode(',',$lesPhotos->photos);
        $nbPhoto = count($tabPhoto);
        
        for($i = 0; $i >= $nbPhoto; $i++){
         unlink("img/chalets/$tabPhoto[$i]");
        }
		
		 $db->query('DELETE FROM location WHERE idL = ?',[$id]);
		
        $db->query("DELETE FROM datelocation WHERE id_location = ?",[$id]);
        
	}

	include('vue/ADMIN/location/homeLocation.php');
?>