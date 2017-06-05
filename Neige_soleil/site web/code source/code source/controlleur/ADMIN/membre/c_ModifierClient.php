<?php

$bd = App::getDatabase();
$id = $_GET['id'];
$client = $bd->query("select * from client where idC = $id ")->fetch();

$prenom= $client->prenom;
$nom= $client->nom;
$email=$client->email;
$confirmation=$client->email;
$ville=$client->ville;
$adresse=$client->adresse;
$codeP=$client->codeP;
$tel=$client->tel;



if(isset($_POST['modifier'])){
       
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
                if($client->email != $email ){
                    $verif = $bd->query(" select * from client where email = '$email' ")->fetchall();
                    $count = count($verif);
                    $_SESSION['test']= $count;
                    if($count == 1){
                        $_SESSION['erreur'] .= "<span> l'email exsiste déjà.</span><br>" ;
                    }
                }
                if($passwordConfime != $password ){
                     $_SESSION['erreur']  .= "<span> votre mot de passe ne sont pas identique.</span><br>";
                    header("Location:?p=monNeigeEtSoleil&gestion=ModifierClient&id=$id");
                    exit();
                 }
               
                if(empty($_SESSION['erreur'])){


                   $bd->query("update client SET nom = ?, password = md5(?),prenom = ?, email = ? , ville= ? ,adresse = ? , codeP = ? ,tel = ?
                where idC = $id ", [
            $nom,
            $password,
            $prenom, 
            $email,
            $ville,
            $adresse,
            $codeP,
            $tel           
                ]);
                    
                   $_SESSION['succer'] ="<span>Le proprietair a bien etait ajouter.</span>";
                header("Location: ?p=monNeigeEtSoleil&gestion=listeMembre");
                exit();
              }
          
          }else{
           $_SESSION['erreur']  .=  "<span> L'email et la confirmation ne sont pas les mêmes .</span><br>";
            header("Location: ?p=monNeigeEtSoleil&gestion=ModifierClient&id=$id");
           exit();
          }
              
      } else{
         header("Location: ?p=monNeigeEtSoleil&gestion=ModifierClient&id=$id");
         exit();
      }
    

}

require 'vue/ADMIN/membre/ModifierClient.php';

?>