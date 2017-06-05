<link rel="stylesheet" type="text/css" href="css/calendrier.css"/>
<?php 

class DetailLocation {
	     
 }
 ?>
  <script type="text/javascript">
            jQuery(function($){
               $('.month').hide();
               $('.month:first').show();
               $('.months a:first').addClass('active');
               var current = 1;
               $('.months a').click(function(){
                    var month = $(this).attr('id').replace('linkMonth','');
                    if(month != current){
                        $('#month'+current).slideUp();
                        $('#month'+month).slideDown();
                        $('.months a').removeClass('active'); 
                        $('.months a#linkMonth'+month).addClass('active'); 
                        current = month;
                    }
                    return false; 
               });
            });
  </script>
<?php

    $db = App::getDatabase();

    $resultatUne = $db->query(" SELECT * FROM location WHERE idL = $id ")->fetch(); 
    $tabphoto = explode(',', $resultatUne->photos);
    $nbPhoto = count($tabphoto); 

    $lesDateLocation = $db->query("SELECT * FROM datelocation where id_location = $id")->fetchall();
   

      $message = "";
      $dateD = "";
      $dateF = "";
      $idL = $_GET['id'];
      $confirme = "attReponse";
   
if(!empty($_SESSION['nomClient'])){
     $reserve = "<button class='submit' id='reservation'>Reserver</button>";

     if(!empty($_POST['valide'])){

        $message = $_POST['message'];
        $dateD = $_POST['dateD'];
        $dateF = $_POST['dateF'];
        
        $idLocataire = $_SESSION['id'];
  
     
         $bd->query(" INSERT INTO demande set dateD = ?, dateF = ?, confirme = ?, location_id = ? ,client_id = ?, message = ? "
          , [ $dateD, 
            $dateF,
            $confirme,
            $idL,
            $idLocataire,
            $message
            ]);
     }
   

}else{
    $reserve = "<br><br> <a class='submit' id='seconnection' >Connection</a><br><br>
                 <span style ='color:#000;'> Vous devais etre connecter pour faire une reservation.</span><br>";
}


  
        require('fonction/date.class.php');



        $date = new Date();
        $year = date('Y');
        $dates = $date->getAll($year);
	include('vue/location/detail.php');
?>