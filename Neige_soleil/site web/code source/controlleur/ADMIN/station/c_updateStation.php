<?php


  $bd = App::getDatabase();
  $id = $_GET['id'];
  $uneStation = $bd->query("select * from station where idS = $id ")->fetch();

$nom = $uneStation->nom;
$ville= $uneStation->ville ;
$codeP= $uneStation->codeP;
$vallee= $uneStation->vallee;
$text= $uneStation->text;
   if($vallee == 1){
            $vallee = 'Vallee des aigues';
        }elseif($vallee == 2){
           $vallee =  'Vallee du Cristillan Ceillac';
        }elseif($vallee == 3){
            $vallee = 'Vallee de izoard arvieux';
        }elseif($vallee == 4){
            $vallee = 'Vallee du Haut-Guil';
        }
                           
                           
$succes ="";
$erreur ="";

if(isset($_POST['modifier'])){
    $securiter = securiter($_POST);
   if($securiter === true){
       var_dump('coucou ');
        $ville= $_POST['ville'];
        $codeP=$_POST['codeP'];
        $vallee=$_POST['vallee'];
        $nom =$_POST['nom'];
        $text=$_POST['text'];


            $bd = App::getDatabase();

        if($vallee == 'Vallee des aigues'){
            $vallee = 1;
        }elseif($vallee == 'Vallee du Cristillan Ceillac'){
           $vallee = 2;
        }elseif($vallee == 'Vallee de izoard arvieux'){
            $vallee = 3;
        }elseif($vallee == 'Vallee du Haut Guil'){
            $vallee = 4;
        }
       //si photo 
       var_dump($_FILES['photo']);
         if($_FILES['photo']['name'] != null ){
             $files = $_FILES;
             $photo = addimg($files,'img/vallee','photo');
            if($photo != false){
                $bd->query("update station set ville = '".$ville."', codeP = ".$codeP.", vallee = ".$vallee.", nom = '".$nom."', photo ='".$photo."', text = '".$text."' where idS = $id ");
            $succes ="<span>La station a bien etait ajouter.</span>"; 
                
            }else{
                $erreur .="<span>Le forma dois etre de forma ... et de taille maxsimome ...</span>";
            }
       //si pas photo
         }else{
              $bd->query(" update station set ville = '".$ville."',
                                            codeP = '".$codeP."',
                                            vallee = ".$vallee." , 
                                            nom = '".$nom."', 
                                            text = '".$text."'
                                            where idS = ".$id."  ");
             
            $succes ="<span>La station a bien etait ajouter.</span>"; 
         }

   }else{
       $erreur = $securiter;
   }
  
}





require "vue/ADMIN/station/updateStation.php";
?>