<?php 

$bd = App::getDatabase();
$info = $bd->query("SELECT * FROM info")->fetch();

$entreprise = $info->entreprise;
$adresse = $info->adresse;
$ville = $info->ville;
$tel = $info->tel;
$codeP = $info->codeP;
$descriptif = $info->descriptif;
    $succer="";

if(isset($_POST['modifier'])){
    
        if(empty($_SESSION['erreur'])){
            $entreprise = $_POST['entreprise'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $tel = $_POST['tel'];
            $codeP = $_POST['codeP'];
            $descriptif = $_POST['descriptif'];

            $bd->query("update info set entreprise = '".$entreprise."',
                                           adresse = '".$adresse."',
                                             ville = '".$ville."',
                                              tel  = '".$tel."',
                                             codeP = '".$codeP."',
                                        descriptif = '".$descriptif."' ");
            $_SESSION['succer'] ="<span>Les information o bien etait modifier </span>";
               header("location: ?p=monNeigeEtSoleil&gestion=info" );
                   exit();
        }else{
               header("location: ?p=monNeigeEtSoleil&gestion=info" );
                   exit();        
        }
}


require 'vue/ADMIN/infoSite/updateInfo.php';
?>