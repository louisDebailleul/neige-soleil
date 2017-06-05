<?php 


$nom = "";
$ville="";
$codeP="";
$vallee="";
$text="";
$succes ="";
$erreur ="";

if(isset($_POST['ajouter'])){
    $securiter = securiter($_POST);
   if($securiter === true){
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
        }elseif($vallee == 'Vallee du Haut-Guil'){
            $vallee = 4;
        }
       //si photo 
         if(!empty($_FILES['photo'])){
             $files = $_FILES;
             $photo = addimg($files,'img/vallee','photo');
            if($photo != false){
                $bd->query("insert into station values ( '','".$ville."',".$codeP.",".$vallee.",'".$nom."','".$photo."','".$text."' ) ");
            $succes ="<span>La station a bien etait ajouter.</span>"; 
                
            }else{
                $erreur .="<span>Le forma dois etre de forma ... et de taille maxsimome ...</span>";
            }
       //si pas photo
         }else{
           
            $erreur .="<span>Il doit y avoir une photo.</span>";
         }

   }else{
       $erreur = $secutiter;
   }
  
}


require 'vue/ADMIN/station/stationAdminadd.php';




?>