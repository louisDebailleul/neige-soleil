<?php 

                                   // decaration \\\
$bd = App::getDatabase();
$erreur="";
$succer ="";
$nomA="";
$photoA = ""; 
$detailA="";
$lienA = "";

if(isset($_GET['action']))
{
    
     
   

    if(securiter($_GET) === true )
    {
        $action = $_GET['action']; 
       
                                                                    // VUE MODIFIER  \\
       
       if($action == 'modifier'){
            $id = $_GET['id'];
            $uneActivite = $bd->query("select * from activite where idA = $id ")->fetch();
            if( $uneActivite->valleeA == 1){
                $valleeA = "Vallée des aigues";
            }elseif( $uneActivite->valleeA == 2){
                $valleeA = "Vallée du Cristillan Ceillac";
            }elseif($uneActivite->valleeA == 3 ){
                $valleeA = "Vallée de l'izoard arvieux";
            }else{
                $valleeA = "Vallée du Haut-Guil";
            }
           
           
// si Post 
            if(isset($_POST['modifier'])){
                if(securiter($_POST) == true ){
                    
                    $nomA= $_POST['nomA'];
                    $detailA = $_POST['detailA'];
                    $lienA = $_POST['lienA'];
                    $valleeA = $_POST['valleeA'];
                    if( $valleeA == "Vallée des aigues"){
                        $valleeA = 1;
                    }elseif( $valleeA == "Vallée du Cristillan Ceillac"){
                        $valleeA = 2;
                    }elseif($valleeA == "Vallée de l'izoard arvieux"){
                        $valleeA = 3;
                    }else{
                        $valleeA = 4;
                    }
        //si photo update
                    if(!empty($_FILES['photoA']['name'])){
                       
                        $lesFiles = $_FILES;
                                $photoA = addimg($lesFiles,'img/activite','photoA') ;
                        if( $photoA != false){
                         
                            if($bd->query("update  activite set nomA= ?, photoA = ?,valleeA = ?, detailA= ?,lienA=?   where idA = ? "
                            ,[$nomA,$photoA,$valleeA,$detailA,$lienA,$id ]))
                            {
                                $succer = "</span>Modification réussis.</span>";
                            }else{
                                $erreur .="<span>Il y a eu un problème de connection a la base de donner.</span>" ;
                            }

                        }else{
                            $erreur .= "<span>le ficher ne dois pas dépaser 10Mo et de forma.</span><br/>";
                        }
          //si pas photo update          
                    }else{
                    
                        if($bd->query("update activite set nomA = '$nomA',
                        valleeA = $valleeA ,
                        detailA = '$detailA' ,
                        lienA = '$lienA'  
                        where idA = $id " ))
                        {
                                $succer = "</span>Modification réussis.</span>";
                         }else{
                                $erreur .="<span>Il y a eu un problème de connection a la base de donner.</span>" ;
                         }

                    }
                }else{
                    $erreur .= "<span>les caractère spéciaux sont interdis.</span><br/>";
                }
             }
//fin si post
        require "vue/ADMIN/activite/activiteModifier.php";
                                                                 // VUE AJOUTER ACTIVITE \\\
        }elseif($action == 'ajouter'){
            if(isset($_POST['ajouter'])){
                if(securiter($_POST) == true){
                     $nomA= $_POST['nomA'];
                    $detailA = $_POST['detailA'];
                    $lienA = $_POST['lienA'];
                    $idA="";
                    $valleeA = $_POST['valleeA'];
                    if( $valleeA == "Vallée des aigues"){
                        $valleeA = 1;
                    }elseif( $valleeA == "Vallée du Cristillan Ceillac"){
                        $valleeA = 2;
                    }elseif($valleeA == "Vallée de l'izoard arvieux"){
                        $valleeA = 3;
                    }else{
                        $valleeA = 4;
                    }
                //si photo update
                    if(!empty($_FILES['photoA']['name'])){
                        $lesFiles = $_FILES;
                        $photoA = addimg($lesFiles,'img/activite','photoA') ;
                        if( $photoA != false){
                           if($bd->query("insert INTO activite values  (?,?,?,?,?,?) ",
                             [$idA,$nomA,$photoA,$detailA,$lienA,$valleeA ]))
                            {
                                $succer = "</span>Modification réussis.</span>";
                            }else{
                                $erreur .="<span>Il y a eu un problème de connection a la base de donner.</span>" ;
                            }
                         }else{
                            $erreur .= "<span>le ficher ne dois pas dépaser 10Mo et de forma.</span><br/>";
                        }
                 //si pas photo update          
                    }else{
                     $erreur .= '<span>il doit y avoir une photo.</span><br/>';
                    }
                }else{
                    $erreur .= "<span>les caractère spéciaux sont interdis.</span><br/>";             
                }
            }
           
            require "vue/ADMIN/activite/activiteAjouter.php";        
        }else{// si $action n'est pas egale a action ou modifier
            $lesActivites = $bd->query("SELECT * from activite")->fetchall();
            require "vue/ADMIN/activite/activite_home.php";
           //si Post supprime
           if(isset($_POST['supprimer'])){
               $securiter = securiter($_POST);
               if($securiter === true){
                  $idA = $_POST['supprimer'];
                   $bd->query("DELETE FROM activite where idA = $idA ");
                   $succes = "<span>L'activité a bien etait supprimer</span>"; 
               }else{
                $erreur .= $securiter;
               }
           
           }
       }
    }else{//si $action n'est pas securiser
    $erreur= "<span>Pas de caractère spéciaux dans l'url.</span>";
    $lesActivites = $bd->query("SELECT * from activite")->fetchall();
             if(isset($_POST['supprimer'])){
               $securiter = securiter($_POST);
               if($securiter === true){
                  $idA = $_POST['supprimer'];
                   $bd->query("DELETE FROM activite where idA = $idA ");
                   $succes = "<span>L'activité a bien etait supprimer</span>"; 
               }else{
                $erreur .= $securiter;
               }
           
           }
    require "vue/ADMIN/activite/activite_home.php";
    }
               
                                                                // vue HOME ACTIVITE \\\
}else{//si pas $action dans le get 
$lesActivites = $bd->query("SELECT * from activite")->fetchall();
         if(isset($_POST['supprimer'])){
               $securiter = securiter($_POST);
               if(empty($_SESSION['erreur']) ){
                  $idA = $_POST['supprimer'];
                   $bd->query("DELETE FROM activite where idA = $idA ");
                   $_SESSION['succer'] = "<span>L'activité a bien etait supprimer</span>";
                   header("location: ?p=monNeigeEtSoleil&gestion=activite" );
                   exit();
               }
           
           }
require "vue/ADMIN/activite/activite_home.php";
}
                   
                   
                               
            


                  
       
          
   

?>
