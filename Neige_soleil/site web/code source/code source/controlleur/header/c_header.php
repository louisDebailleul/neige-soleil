<?php
session_start();
if($_SESSION['succer'] == null and $_SESSION['erreur']== null ){
  $_SESSION['succer']= null;
  $_SESSION['erreur']= null;
   $_SESSION['$untour'] = 1;
}


if($_SESSION['succer'] != null or $_SESSION['erreur'] != null ){
   if( $_SESSION['$untour'] == null){
        $_SESSION['succer']=null;
        $_SESSION['erreur']=null;
          $_SESSION['$untour'] = 1;
   }else{
     $_SESSION['$untour'] = null;
   }
}



require "function/function.php";
 $erreur = "";
 $email ="";
 $password="";
  $bd = App::getDatabase();

$titrePresentationPage = "";
$textPresentationPage = "";

//deconnection client
 if (isset($_GET['deconnection'])) {
	session_unset();
	}
//securiter des Post
if(isset($_POST)){
    $securiter = securiter($_POST);
    if($securiter != 'true'){
         $_SESSION['erreur'] = $securiter ;
        var_dump($erreur);
    }
//        else{
//         $_SESSION['erreur'] .= $securiter;
//    }
}


if(isset($_GET)){
    $securiter = securiter($_GET);
    if($securiter == 'true'){
      if(!empty($_GET['p'])){
          if($_GET['p'] == 'monNeigeEtSoleil'){
            $titrePresentationPage = "";
            $textPresentationPage = "";
          
          }else{
               $LesPresentation = $bd->query("select * from presentation ")->fetchall();
               $intitue = $_GET['p'];
              foreach($LesPresentation as $Presentation) {
                  if( $intitue == $Presentation->intitule ) {

                      $unePresentation = $Presentation;
                  }
              }
          
          }
      }else{
        $unePresentation = $bd->query("select * from presentation where id = 1")->fetch();
    
      }
     if(!empty($unePresentation)){
      $titrePresentationPage = $unePresentation->titre;
      $textPresentationPage = $unePresentation->text;
     }
    }else{
        $erreur = $securiter;
    }
}




  //connection cient / proprietair
if(isset($_POST['connection'])){
    $email =$_POST['email'];
    $password=$_POST['motPasse'];
    if($erreur == 'true'){
        $client = $bd->query("SELECT * FROM client where email = '$email' and password = MD5('$password') ")->fetch(PDO::FETCH_OBJ);
        if($client!= false){
            $_SESSION['id']= $client->idC;
            $_SESSION['nomClient']= $client->nom;
        }else{
            $proprietair = $bd->query("SELECT * FROM proprietair where email = '$email' 
                                                                and password = MD5('$password') ")->fetch(PDO::FETCH_OBJ);
            var_dump($proprietair);
            if($proprietair!= false){
                $_SESSION['id']= $proprietair->id;
                $_SESSION['proprietair']= $proprietair->nom;
            } else{
                $erreur .= "<span> Mot de passe ou email incorrect <span>"; 	
            }
        }
    }else{
        $erreur .= $erreur;
    }
}
//connection clients dans page detail location

if(isset($_POST['connectionClient'])){
    $email =$_POST['email'];
    $password=$_POST['motPasse'];
    if($erreur == 'true'){
        $client = $bd->query("SELECT * FROM client where email = '$email' and password = MD5('$password') ")->fetch(PDO::FETCH_OBJ);
        if($client!= false){
            $_SESSION['id']= $client->idC;
            $_SESSION['nomClient']= $client->nom;
        }else{
            $erreur .="<span> Mot de passe ou email incorrect <span>";
        }
    }
}

// change le boutton connection en mon compt 
if(!empty($_SESSION['nomClient'])){
	$id = $_SESSION['id'];
	$monCompte = " <a href='?p=monCompte&id=$id'><img src='img/icone/login_bleu.png' ></a>";
} elseif(!empty($_SESSION['proprietair'])){
	$id = $_SESSION['id'];
	$monCompte = "<a href='?p=monCompteProprietair&id=$id'><img src='img/icone/login_bleu.png' > </a>";
}else{
	$monCompte = " <a id='connection' ><img src='img/icone/login_rouge.png' ></a>";
}
// les info du site ex : adresse,tel etc...

 $info = $bd->query("SELECT * FROM info where id = 1 ")->fetch();
?>