<?php
	class produit{

		private $id_produit=null;
		private $nom=null;
		private $descr=null;		
		private $code_categ=null;
		private $prix=null;
		private $qte_stock=null;
		private $date=null;

		
		
	
		
		function __construct( $nom, $descr, $code_categ, $prix, $qte_stock){

			$this->nom=$nom;
			$this->descr=$descr;
			$this->code_categ=$code_categ;
			$this->prix=$prix;
			$this->qte_stock=$qte_stock;
			
		}
		
		function getid_produit(){
			return $this->id_produit;
		}

		function getNom(){
			return $this->nom;
		}
		function getdescr(){
			return $this->descr;
		}

		function getcode_categ(){
			return $this->code_categ;
		}

		function getprix(){
			return $this->prix;
		}

		function getqte_stock (){
			return $this->qte_stock ;
		}

		function getdate (){
			return $this->date ;
		}
		
		
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setdescr(string $descr){
			$this->descr=$descr;
		}
		function setcode_categ(string $code_categ){
			$this->code_categ=$code_categ;
		}

		function setprix(string $prix){
			$this->prix=$prix;
		}
		
		function setqte_stock (int $qte_stock ){
			$this->qte_stock =$qte_stock ;
		}
		
		function setdate (int $date ){
			$this->date =$date ;
		}
	
	}


?>