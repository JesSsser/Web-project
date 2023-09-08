<?php
	include '..\Controller\categorieC.php';
	$categorieC=new categorieC();

if (isset($_GET["code_categ"])){
	$categorieC->supprimercategorie($_GET["code_categ"]);
	header('Location:affichercategorie.php');
}
?>