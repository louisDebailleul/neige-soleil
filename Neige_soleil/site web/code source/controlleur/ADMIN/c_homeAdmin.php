<?php
  if (isset($_GET['deconnection'])) {
	  session_unset();
}

require 'vue/ADMIN/home.php';
?>