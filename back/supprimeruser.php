<?php
	include '..\Controller\UserC.php';
	$userC=new UserC();

if (isset($_GET["id_user"])){
	$userC->supprimeruser($_GET["id_user"]);
	header('Location:afficheruser.php');
}

?>