<?php


 $bd = App::getdatabase();

 $saison = $bd->query("SELECT * FROM saison where idS != 6 ")->fetchall();

 	$formulaire = "<form method='POST' action='?p=saison'>";
 foreach ($saison as $uneSaison) {
 				$formulaire .= "<h4 class='bleu'>".$uneSaison->type."</h4><br>
                               <hr>
                                <div style='width: 248px;margin: 0 auto;'>
                               <label>date debut</label><br>
 								<input class='menu_reight' type='date' name='dateD[]' value='".$uneSaison->dateDebut."' ><br>
                                <label>date fin</label><br>
 								<input class='menu_reight' type='date' name='dateF[]' value='".$uneSaison->dateFin."' ><br>
                                <label>Coef</label><br>
 								<input class='menu_reight' type='float' name='coef[]' value='".$uneSaison->coef."' ><br>
                                <input class='menu_reight' type='hidden' name='idS[]' value='".$uneSaison->idS."' ><br>
                                </div>
 								";
 }
 			
    $formulaire .="<br><button class='submit' type='submit' name='valider' value ='valider'>sauvegarder</button> </form>";

    if(!empty($_POST['valider'])){
    	$nbSaison = count($_POST['dateD']); 

         
        for ($i=0; $i <= $nbSaison-1; $i++) { 
   
            $uneDateD = $_POST['dateD'][$i];
            $uneDateF =$_POST['dateF'][$i];
            $unCoef = $_POST['coef'][$i];
            $idSaison = $_POST['idS'][$i];

    		$bd->query("UPDATE saison set dateDebut = ?, dateFin = ?, coef = ? 
                        WHERE idS = ?",
                        [
                        $uneDateD,
                        $uneDateF,
                        $unCoef,
                        $idSaison 
                        ]);
    	}

         foreach ($saison as $uneSaison) {
                  $requete = "update datelocation set id_saison = ".$uneSaison->idS." 
                  where dateJour BETWEEN '".$uneSaison->dateDebut."' and '".$uneSaison->dateFin."'
                   ";
                
                  $bd->query($requete);
               }
        
    }
include "vue/ADMIN/saison/saison.php";


?>