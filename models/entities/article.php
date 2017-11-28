<?php


	class Article {
		
		private $title = ""; 
		private $datepost;
		private $author = "";
		private $content = "";
		
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