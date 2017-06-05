<?php 

class MentionLegale {

	
}

$bd = App::getDatabase();
$mentionLegale = $bd->query('SELECT mentionLegale FROM info')->fetch();

	include('view/mentionLegale.php');
?>