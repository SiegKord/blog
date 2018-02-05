<?php

require_once "/../../db/SPDO.php";
require_once "/../entities/user.php";


class UserDAO {
	
	public function getUser($idUser) {
		
		if($idUser == null)
			return null;
		$myUser = new User;
		$db = SPDO::getInstance();
		
		$req = $db->query("SELECT * FROM user WHERE id = $idUser");
		if($req == false)
			return null;
		$resultArt = $req->fetch(\PDO::FETCH_ASSOC);
		$myUser->setPseudo($resultArt['pseudo']);
		$myUser->setMdp($resultArt['mdp']);
		$myUser->setNom($resultArt['nom']);
		$myUser->setPrenom($resultArt['prenom']);
		$myUser->setBirthdate($resultArt['birthdate']);
		$myUser->setEmail($resultArt['email']);
		$myUser->setId($resultArt['id']);
			
		return $myUser;
	}
	
	public function setUser($user) { 

			$db = SPDO::getInstance();
			
			if($user->getId() !==null) {
				$req = $db->exec("UPDATE user SET pseudo ='" . $user->getPseudo() . "', mdp = '" . $user->getMdp() . "', email = '" . $user->getEmail() . "' WHERE id = '" . $user->getId() . "'");
				
			}
			else {
			$req = $db->exec("INSERT INTO user(`pseudo`, `mdp`, `nom`, `prenom`, `birthdate`, `email`) VALUES ('" . $user->getPseudo() . "', '" . $user->getMdp() . "', '" . $user->getNom() . "', '" . $user->getPrenom() . "', '" . $user->getBirthdate() . "', '" . $user->getEmail() . "');");
			}
			
			
			$last_ID = $db->lastInsertId();
			$user->setId($last_ID);
			$user->setPseudo($user->getPseudo());
			$user->setMdp($user->getMdp());
			$user->setNom($user->getNom());
			$user->setPrenom($user->getPrenom());
			$user->setBirthdate($user->getBirthdate());
			$user->setEmail($user->getEmail());
		
			return $user;

			
	}
	public function getAllUsers() {
		
		$userlist = new UserDAO;
		$listeIDs = [];
		$user = [];
			
		$db = SPDO::getInstance();
		$req = $db->query("SELECT id FROM user ORDER BY pseudo");
		$result = $req->fetchAll(\PDO::FETCH_ASSOC);
		foreach($result as $data) {
			$listeIDs[] = $data['id'];
		}
		foreach($listeIDs as $idUser){
			$user[] = $userlist->getUser($idUser);
			
			
		}
		return $user;	
	}
		
	public function get7Users() {
		
		$userlist = new UserDAO;
		$listeIDs = [];
		$user = [];
			
		$db = SPDO::getInstance();
		$req = $db->query("SELECT id FROM user ORDER BY pseudo LIMIT 0,7");
		$result = $req->fetchAll(\PDO::FETCH_ASSOC);
		foreach($result as $data) {
			$listeIDs[] = $data['id'];
		}
		foreach($listeIDs as $idUser){
			$user[] = $userlist->getUser($idUser);
			
			
		}
		return $user;	
	}
	
	public function deleteUser($idUser) {
		
		$db = SPDO::getInstance();
			
		$req = $db->exec("DELETE FROM user WHERE id = $idUser");
	}
	
	public function alreadyUsedPseudo($pseudo) {
		
		$db = SPDO::getInstance();
		$req = $db->query("SELECT COUNT(*) FROM user WHERE pseudo = '$pseudo'");
		$result = $req->fetchColumn();
		if($result>0)
			return true;
		else
			return false;

	}
	
	public function alreadyUsedEmail($email) {
		
		$db = SPDO::getInstance();
		$req = $db->query("SELECT id FROM user WHERE email = '$email'");
		$result = $req->fetchColumn();
		if($result>0)
			return true;
		else
			return false;
		
	}
		
	public function nbArticle($idArticle){
		
		$db = SPDO::getInstance();
		$req = $db->query("SELECT COUNT(auteur_id) FROM article INNER JOIN user ON user.id = article.auteur_id WHERE article.auteur_id = '$idArticle'");
		$result = $req->fetch(\PDO::FETCH_ASSOC);
		var_dump($result);
		$nbArticle = $result['COUNT(auteur_id)'];
		
		
		return $nbArticle;
	}
	
	public function getConnect($email, $mdp) {
		
		$db = SPDO::getInstance();
		$req = $db->query("SELECT id FROM user WHERE email = '$email' AND mdp = '$mdp'");
		var_dump($req);
		$result = $req->fetchColumn();
		var_dump($result);
		if($result>0)
			return true;
		else
			return false;
	}
	
}
