<?php 
	$db = App::getDatabase();
	$clients = $db->query('SELECT * FROM client')->fetchall();
	$locataires = $db->query('SELECT * FROM proprietair')->fetchall();
	$admins = $db->query('SELECT * FROM admin')->fetchall();
if(!empty($_POST['supprimer'])){
        $table = $_POST['supprimer'];
    if($table === 'client'){
        $id = $_POST['id'];
        var_dump($id);
        $db->query("delete from client where idC = '$id' ");
        $_SESSION['succer'] = "<span>Le client a bien etait supprimer <span><br>";
    }elseif($table === 'proprietair'){
        $id = $_POST['id'];
        $db->query("delete from proprietair where id = $id ");
        $_SESSION['succer'] = "<span>Le proprietair a bien etait supprimer <span><br>";    
    }elseif($table === 'admin'){
        $id = $_POST['id'];
        $db->query("delete from admin where idC = $id ");
        $_SESSION['succer']  = "<span>Le admin a bien etait supprimer <span><br>";
    }
    header('Location: ?p=monNeigeEtSoleil&gestion=listeMembre');
    exit();
}
	require "vue/ADMIN/membre/listeMembre.php";
?>