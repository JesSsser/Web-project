<?php
		include_once '..\Config.php';
		include_once '..\Model\categorie.php';

	class categorieC {
		function affichercategorie(){
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimercategorie($code_categ){
			$sql="DELETE FROM categorie WHERE code_categ=:code_categ";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':code_categ', $code_categ);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajoutercategorie($categorie){
			$sql="INSERT INTO categorie (lib_categ, desc_categ) 
			VALUES (:lib_categ, :desc_categ)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'lib_categ' => $categorie->getlib_categ(),
					'desc_categ' => $categorie->getdesc_categ(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercategorie($code_categ){
			$sql="SELECT * from categorie where code_categ=$code_categ";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercategorie($categorie, $code_categ){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
						lib_categ= :lib_categ,
						desc_categ= :desc_categ
					WHERE code_categ= :code_categ'
				);
				$query->execute([
					'lib_categ' => $categorie->getlib_categ(),
					'desc_categ' => $categorie->getdesc_categ(),
					'code_categ' => $code_categ			
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}



		




	}
?>