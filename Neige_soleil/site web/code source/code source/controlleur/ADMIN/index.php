<?php 

if(isset($_GET['gestion'])) {
    $page2 = $_GET['gestion'];
} else{ 
    $page2 = 'homeAdmin';
}


       //gestion d'appel de page admin\\
if(!empty($_SESSION['admin'])){
  
    if($page2 === 'homeAdmin'){
        require'controlleur/ADMIN/c_homeAdmin.php';
    }elseif ($page2 === 'homeLocation') {
        require 'controlleur/ADMIN/location/c_homeLocation.php';	
    }elseif ($page2 === 'addLocation') {
        require 'controlleur/ADMIN/location/c_addLocation.php';	
    }elseif ($page2 === 'updateLocation') {
        $id = $_GET['id'];
        require 'controlleur/ADMIN/location/c_updateLocation.php';	
    }elseif($page2 === 'demande') {
        require 'controlleur/ADMIN/demandeLocataire/c_demande.php';	
    }elseif ($page2 === 'unedemande') {
        $id = $_GET['id'];
        require 'controlleur/ADMIN/demandeLocataire/c_unedemande.class.php';	
    }elseif ($page2 === 'listeMembre') {
        require 'controlleur/ADMIN/membre/c_listeMembre.php';	
    }elseif ($page2 === 'info') {
        require 'controlleur/ADMIN/infoSite/c_updateInfo.php';	
    }elseif ($page2 === 'creeDemande') {
        require 'controlleur/ADMIN/demandeLocataire/c_creeDemande.php';	
    }elseif ($page2 === 'creeAdmin') {
        require 'controlleur/ADMIN/membre/c_creeAdmin.php';	
    }elseif ($page2 === 'saison') {
        require 'controlleur/ADMIN/saison/c_saison.php';	
    }elseif ($page2 === 'demandeProprietaire') {
        require 'controlleur/ADMIN/demandeProprietaire/c_demandeProprietaire.php';	
    }elseif ($page2 === 'unedemandeProprio') {
        require 'controlleur/ADMIN/demandeProprietaire/c_unedemandeProprietaire.php';
    }elseif ($page2 === 'stationAdminadd') {
        require 'controlleur/ADMIN/station/c_stationAdminadd.php';
    }elseif ($page2 === 'stationAnneadd') {
        require 'controlleur/ADMIN/station/c_stationAnneadd.php';
    }elseif ($page2 === 'stationAdmin') {
        require 'controlleur/ADMIN/station/c_station.php';
    }elseif ($page2 === 'activite') {
        require 'controlleur/ADMIN/activite/c_activite.php';
    }elseif ($page2 === 'ModifierClient') {
        require 'controlleur/ADMIN/membre/c_ModifierClient.php';
    }elseif ($page2 === 'ModifierProprietair') {
        require 'controlleur/ADMIN/membre/c_ModifierProprietair.php';
    }elseif ($page2 === 'updateStation') {
        require 'controlleur/ADMIN/station/c_updateStation.php';
    }elseif ($page2 === 'updateAnnee') {
        require 'controlleur/ADMIN/station/c_updateAnnee.php';
    }elseif ($page2 === 'AjouterProprietair') {
        require 'controlleur/ADMIN/membre/c_AjouterProprietair.php';
    
    }elseif ($page2 === 'AjouterClient') {
        require 'controlleur/ADMIN/membre/c_ajouterClient.php';
    }elseif ($page2 === 'ModifierAdmin') {
        require 'controlleur/ADMIN/membre/c_ModifierAdmin.php';
    }elseif ($page2 === 'locationLouer') {
        require 'controlleur/ADMIN/location/c_locationLouer.php';
    }elseif ($page2 === 'AjouterAdmin') {
        require 'controlleur/ADMIN/membre/c_creeAdmin.php';
    
    }else{
        require 'controlleur/ADMIN/c_homeAdmin.php';
    }
}else{
    require 'controlleur/ADMIN/c_connection.php';
}
?>