<?php
############ Session Destroy  ############
session_start();
session_destroy();
header("Location:../../login");

//if(isset($_SESSION['userData'])){
//	header('location: view.php');
//}

?>