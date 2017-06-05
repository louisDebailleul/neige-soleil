<?php 


$db = App::getDatabase();

$vallee_aigues = $db->query(" select * from activite where valleeA = '1' ")->fetchall();
$Vallee_Ceillac = $db->query("SELECT * FROM activite where valleeA ='2' ")->fetchall();
$Vallee_Guil = $db->query("SELECT * FROM activite where valleeA ='3' ")->fetchall();
$Vallee_Arvieux = $db->query("SELECT * FROM activite where valleeA ='4' ")->fetchall();


include('vue/activite/activite.php');
?>