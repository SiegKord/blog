<?php


	class Article {
		
		private $id;
		private $title = ""; 
		private $datepost;
		private $dateEdit;
		private $author = "";
		private $content = "";
		
		function __construct() {
		
			//constructeur de la classe Article
			try {
				$dateTime = new DateTime("now", new DateTimeZone('Europe/Paris'));
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			$this->setDatePost($dateTime->format('Y-m-d H:i:s'));
		
		}
		
		public function getId() {
			
			return $this->id;
			
		}
		
		public function setId($value) {
			
			$this->id = $value;
			
		}
		
		public function getTitle() {
			
			return $this->title;
		}
		
		public function setTitle($value) {
			
			$this->title = $value;
			
		}
		
		public function getDatepost() {
			
			return $this->datepost;
		}
		
		public function setDatepost($value) {
			
			$this->datepost = $value;
			
		}
		
		public function getDateEdit() {
			
			return $this->dateEdit;
		}
		
		public function setDateEdit($value) {
		
			$this->dateEdit = $value;
		}
		
		public function getAuthor() {
			
			return $this->author;
		}
		
		public function setAuthor($value) {
			
			$this->author = $value;
			
		}
		
		public function getContent() {
			
			return $this->content;
		}
		
		public function setContent($value) {
			
			$this->content = $value;
			
		}
		
	}	
?>