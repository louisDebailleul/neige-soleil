<?php 



	$nom ="";
	$prenom = "";
	$password = "";
	$passComfirme = "";
	$email = "";
	$emailComfirme = "";
   
if(!empty($_POST['ajouter'])){
    $securiter = securiter($_POST);
    if($securiter == 'true' ){
  
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['password'];
        $passComfirme = $_POST['passComfirme'];
        $email = $_POST['email'];
        $emailComfirme = $_POST['emailComfirme'];
        if($emailComfirme != $email ){
             $_SESSION['erreur'] .= "<span>Les emails ne sont pas les mêmes. </span><br>";
        }
        if($passComfirme != $password){
             $_SESSION['erreur'] .= "<span>Les mots de passes ne sont pas les mêmes. </span><br>";
        }
        if(empty($_SESSION['erreur'])){
            $bd = App::getDatabase();
            $bd->query("INSERT INTO admin SET nom = ?, prenom = ?, password = md5(?) , email = ?",
                        [ $nom,
                        $prenom,
                        $password,
                        $email
                        ]);
            $_SESSION['succer'] ="<span>L'admin a bien etait ajouter.</span>";
            header('Location: ?p=monNeigeEtSoleil&gestion=listeMembre');
            exit();
        }else{
             header('Location: ?p=monNeigeEtSoleil&gestion=AjouterAdmin');
            exit();
        }
    }else{
        $_SESSION['erreur'] .= $securiter;
    }

}
	
include "vue/ADMIN/membre/creeAdmin.php";
?>