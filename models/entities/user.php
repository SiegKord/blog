<?php

	class User {
		
		private $id;
		private $pseudo = "";
		private $mdp = "";
		private $nom = "";
		private $prenom = "";
		private $birthdate = "";
		private $email = "";
		
		public function getId() {
			
			return $this->id;
		}
		
		public function setId($value) {
			
			$this->id = $value;
		}
		
		public function getPseudo(){
			
			return $this->pseudo;
		}
		
		public function setPseudo($value) {
			
			$this->pseudo = $value;
		}
		public function getMdp() {
			
			return $this->mdp;
		}
		
		public function setMdp($value) {
			
			$this->mdp = $value;
		}
		
		public function getNom() {
			
			return $this->nom;
		}
		
		public function setNom($value) {
			
			$this->nom = $value;
		}
		
		public function getPrenom() {
			
			return $this->prenom;
		}
		
		public function setPrenom($value) {
			
			$this->prenom = $value;
		}
		
		public function getBirthdate(){
			
			return $this->birthdate;
		}
		
		public function setBirthdate($value) {
			
			$this->birthdate = $value;
		}
		
		public function getEmail() {
			
			return $this->email;
		}
		
		public function setEmail($value) {
			
			$this->email = $value;
		}
	}

?>