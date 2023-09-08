<?php
	include_once '..\Config.php';
	include_once '..\Model\produit.php';




	class produitC {
		function afficherproduits(){
			$sql="SELECT * FROM produit ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function supprimerproduit($id_produit){
			$sql="DELETE FROM produit WHERE id_produit=:id_produit";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_produit', $id_produit);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function ajouterproduit($produit){
			$sql="INSERT INTO produit (Nom, descr, code_categ, prix, qte_stock) 
			VALUES (:Nom,:descr,:code_categ,:prix,:qte_stock)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Nom' => $produit->getNom(),
					'descr' => $produit->getdescr(),
					'code_categ' => $produit->getcode_categ(),
					'prix'=> $produit->getprix(),
					'qte_stock'=> $produit->getqte_stock(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererproduit($id_produit){
			$sql="SELECT * from produit where id_produit=$id_produit";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierproduit($produit, $id_produit){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
						Nom= :Nom, 
						descr= :descr, 
						code_categ= :code_categ, 
						prix= :prix,
						qte_stock = :qte_stock				
					WHERE id_produit= :id_produit'
				);
				$query->execute([
					'Nom' => $produit->getNom(),
					'descr' => $produit->getdescr(),
					'code_categ' => $produit->getcode_categ(),
					'prix'=> $produit->getprix(),
					'qte_stock'=> $produit->getqte_stock(),
					'id_produit' => $id_produit
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function rechercheproduitsParNom($nom) {
			$sql = "SELECT * FROM produit WHERE nom LIKE :nom";
			$db = config::getConnexion();
			try {
				$query = $db->prepare($sql);
				$query->bindValue(':nom', '%' . $nom . '%'); // Utilisation du joker % pour rechercher partiellement
				$query->execute();
				$liste = $query->fetchAll();
				return $liste;
			} catch (Exception $e) {
				die('Erreur:' . $e->getMessage());
			}
		}
		

		function trieasc(){
			$sql="SELECT * FROM produit order by prix";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function triedesc(){
			$sql="SELECT * FROM produit order by prix desc";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function dateup(){
			$sql="SELECT * FROM produit where date >='2023/01/01'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function datedown(){
			$sql="SELECT * FROM produit where date <='2023/01/01'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

	}
?>