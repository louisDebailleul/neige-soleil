
<?php 

$bd = App::getDatabase();


 $laLocation = $bd->query("SELECT * FROM location 
							LEFT JOIN locataire
							ON location.locataire_id = locataire.id 
							where idL = $id ")->fetch(PDO::FETCH_OBJ);

 $nom = $laLocation->Nom;

  $descriptif = $laLocation->detail;
  $chambre = $laLocation->chambre;
  $place = $laLocation->place;
  $douche = $laLocation->douche;
  $prixS = $laLocation->prixS;
  $prixJ = $laLocation->prixJ;
  $ville = $laLocation->ville;
  $vallee = $laLocation->vallee;
  $adresse = $laLocation->adresse;
  $cp = $laLocation->codeP;
  $nomProprietaire = $laLocation->nom;
  $prenomProprietaire = $laLocation->prenom;



if(isset($_POST['submit'])){
  $descriptif =$_POST['descriptif'];
  $chambre = $_POST['chambre'];
  $place = $_POST['place'];
  $douche = $_POST['douche'];
  $prixS = $_POST['prixS'];
  $prixJ = $_POST['prixJ'];
  $ville = $_POST['ville'];
  $vallee =$_POST['vallee'];
  $adresse = $_POST['adresse'];
  $cp = $_POST['cp'];
  $nomProprietaire =$_POST['nomProprietaire'];
  $prenomProprietaire =$_POST['prenomProprietaire'];
}
var_dump($_POST);
var_dump($laLocation);
	include('vue/ADMIN/location/updateLocation.php');
?>