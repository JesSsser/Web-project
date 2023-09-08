<?php
	include '..\Controller\ProduitC.php';
	$produitC=new ProduitC();

if (isset($_GET["id_produit"])){
	$produitC->supprimerproduit($_GET["id_produit"]);
	header('Location:afficherproduit.php');
}

?>