<?php 
class Img {

	static function creerMin($img,$chemin,$nom,$mlargeur=100,$mhauteur=100){
		// On supprime l'extension du nom
		$nom = substr($nom,0,-4);
		// On récupère les dimensions de l'image
		$dimension=getimagesize($img);
		// On cré une image à partir du fichier récup
		if(substr(strtolower($img),-4)==".jpg"){$image = imagecreatefromjpeg($img); }
		else if(substr(strtolower($img),-4)==".png"){$image = imagecreatefrompng($img); }
		else if(substr(strtolower($img),-4)==".gif"){$image = imagecreatefromgif($img); }
		// L'image ne peut etre redimensionne
		else{return false; }
		
		// Création des miniatures
		// On cré une image vide de la largeur et hauteur voulue
		$miniature =imagecreatetruecolor ($mlargeur,$mhauteur); 
		// On va gérer la position et le redimensionnement de la grande image
		if($dimension[0]>($mlargeur/$mhauteur)*$dimension[1] ){ $dimY=$mhauteur; $dimX=$mhauteur*$dimension[0]/$dimension[1]; $decalX=-($dimX-$mlargeur)/2; $decalY=0;}
		if($dimension[0]<($mlargeur/$mhauteur)*$dimension[1]){ $dimX=$mlargeur; $dimY=$mlargeur*$dimension[1]/$dimension[0]; $decalY=-($dimY-$mhauteur)/2; $decalX=0;}
		if($dimension[0]==($mlargeur/$mhauteur)*$dimension[1]){ $dimX=$mlargeur; $dimY=$mhauteur; $decalX=0; $decalY=0;}
		// on modifie l'image crée en y plaçant la grande image redimensionné et décalée
		imagecopyresampled($miniature,$image,$decalX,$decalY,0,0,$dimX,$dimY,$dimension[0],$dimension[1]);
		// On sauvegarde le tout
		imagejpeg($miniature,$chemin."/".$nom.".jpg",90);
		return true;
	}
	

	static function convertirJPG($img){
		// On cré une image à partir du fichier récup
		if(substr(strtolower($img),-4)==".jpg"){$image = imagecreatefromjpeg($img); }
		else if(substr(strtolower($img),-4)==".png"){$image = imagecreatefrompng($img); }
		else if(substr(strtolower($img),-4)==".gif"){$image = imagecreatefromgif($img); }
		// L'image ne peut etre redimensionne
		else{return false; }
		unlink($img);
		imagejpeg($image,substr($img,0,-3)."jpg",90);	
		return true;
				
	}
      public function addimage(){
      
    
            if (!empty($_FILES['Image']['name'])) {
                $refresh ='';
                $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
                $charArray = str_split($chars);
                for($i = 0; $i < 2; $i++){
                    $randItem = array_rand($charArray);
                    $refresh .= "".$charArray[$randItem];
                }
                $prefix = $id.'_'.$numimage.'-'.$refresh.'_';
                $retour_image = $this->uploadImage('produits/', 1200, 1200, false, $nom, $prefix);
                if($retour_image['statut']=='success'){
                    $image = $retour_image['success'];
                    $field = 'Image'.$numimage;
                    if($this->Product->update($id, [
                        $field => $image
                    ])){
                        $success .= ' -> '._("Image").' '.$retour_image['success'].' '._("ajoutée");
                    }else{
                        $erreurs = $retour_image['erreurs'];
                    }
                }else{
                    $erreurs = $retour_image['erreurs'];
                }
            }else{
                $erreurs = _("Veuillez choisir un fichier");
            }
            unset($_POST);
            return $this->edit($id,$erreurs,$success);
        }else{
            $erreurs = _("Impossible d'ajouter la photo");
            return $this->index($erreurs);
        }

    }
}

?>
