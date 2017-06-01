<?php
    var_dump($_SESSION); 
$bd = App::getDatabase();
$id = $_GET['id'];
$admin = $bd->query("select * from admin where idC = $id ")->fetch();
   $_SESSION['test']= "" ;
$prenom= $admin->prenom;
$nom= $admin->nom;
$email= $admin->email;
$id = $admin->idC;

if(isset($_POST['modifier'])){
        
$prenom= $_POST['prenom'];
$nom= $_POST['nom'];
$email=$_POST['email'];
    if($admin->email != $email ){
        $verif = $bd->query(" select * from admin where email = '$email' ")->fetchall();
        $count = count($verif);
        $_SESSION['test']= $count;
        if($count == 1){
            $_SESSION['erreur'] .= "<span> l'email exsiste déjà.</span><br>" ;
         }
    }

    if(empty($_SESSION['erreur'])){
         $bd->query("update admin SET nom = ?, prenom = ?, email = ? where idC = $id ", [
                $nom,
                $prenom, 
                $email
                ]);

        $_SESSION['succer']="<span> les informations on bien etait modifier.</span><br>";
       header('Location: ?p=monNeigeEtSoleil&gestion=listeMembre');
            exit();
    }else{
        header("Location: ?p=monNeigeEtSoleil&gestion=ModifierAdmin&id=$id");
        exit();
    }
}

require 'vue/ADMIN/membre/ModifierAdmin.php';

?>