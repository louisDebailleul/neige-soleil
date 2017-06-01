<?php

$bd = App::getDatabase();


$prenom="";
$nom= "";
$email="";
$confirmation="";
$ville="";
$adresse="";
$codeP="";
$tel="";
$passwordConfime="";

if(isset($_POST['Ajouter'])){
       
      if(empty($_SESSION['erreur'])){
            $email=$_POST['email'];
            $passwordConfime = $_POST['passwordConfime'];
            $password =  $_POST['password'];
            $prenom= $_POST['prenom'];
            $nom= $_POST['nom'];
            $ville=$_POST['ville'];
            $adresse=$_POST['adresse'];
            $codeP=$_POST['codeP'];
            $tel=$_POST['tel'];
            $emailConfirme = $_POST['emailConfirme'];
           // comfirme email
            if($email == $emailConfirme ){
                // verif email doublon bdd
                $verif = $bd->query("select * from client where email = '".$email."'")->fetch();
                
                if($verif != null){
                $_SESSION['erreur'] .= "<span> L'email est deja utiliser.</span><br>";
                header("Location: ?p=monNeigeEtSoleil&gestion=AjouterClient");
                exit();
                }
                if($passwordConfime != $password ){
                     $_SESSION['erreur']  .= "<span> votre mot de passe ne sont pas identique.</span><br>";
                    header("Location: ?p=monNeigeEtSoleil&gestion=AjouterClient");
                    exit();
                 }
                var_dump('coucou');
                if(empty($_SESSION['erreur'])){


                 $bd->query("insert into client (nom , password,prenom, email, ville,adresse, codeP,tel)
                             values('".$nom."',md5('".$password."'), '".$prenom."', '".$email."','".$ville."','".$adresse."','".$codeP."','".$tel."')");
                    
                   $_SESSION['succer'] ="<span>Le proprietair a bien etait ajouter.</span>";
                header("Location: ?p=monNeigeEtSoleil&gestion=listeMembre");
                exit();
              }
          
          }else{
           $_SESSION['erreur']  .=  "<span> L'email et la confirmation ne sont pas les mêmes .</span><br>";
            header("Location: ?p=monNeigeEtSoleil&gestion=AjouterClient");
           exit();
          }
              
      } else{
         header("Location: ?p=monNeigeEtSoleil&gestion=AjouterClient");
         exit();
      }
    

}

require 'vue/ADMIN/membre/AjouterClient.php';

?>