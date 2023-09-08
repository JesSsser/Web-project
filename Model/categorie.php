<?php
	class categorie{
		private $code_categ=null;
		private $lib_categ=null;
		private $desc_categ=null;


		function __construct($lib_categ, $desc_categ){
			$this->lib_categ=$lib_categ;
			$this->desc_categ=$desc_categ;

		}
		function getlib_categ(){
			return $this->lib_categ;
		}
		
		function getdesc_categ(){
			return $this->desc_categ;
		}
		
		function getcode_categ(){
			return $this->code_categ;
		}

		function setlib_categ(string $lib_categ){
			$this->lib_categ=$lib_categ;
		}

		function setdesc_categ(string $desc_categ){
			$this->desc_categ=$desc_categ;
		}
		
		
		function setcode_categ(string $code_categ){
			$this->code_categ=$code_categ;
		}

		
	
	}


?>