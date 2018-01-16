<?php

require_once "/../../db/SPDO.php";
require_once "/../entities/user.php";


class UserDAO {
	
	public function getUser($idUser) {
		
		$myUser = new User;
		$db = SPDO::getInstance();
	
		$req = $db->query("SELECT * FROM user WHERE id = $idUser");
		$resultArt = $req->fetch(\PDO::FETCH_ASSOC);
		$myUser->setPseudo($resultArt['pseudo']);
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
				$req = $db->exec("UPDATE user SET pseudo ='" . $user->getPseudo() . "', email = '" . $user->getEmail() . "' WHERE id = '" . $user->getId() . "'");
				
			}
			else {
			$req = $db->exec("INSERT INTO user(`pseudo`, `nom`, `prenom`, `birthdate`, `email`) VALUES ('" . $user->getPseudo() . "', '" . $user->getNom() . "', '" . $user->getPrenom() . "', '" . $user->getBirthdate() . "', '" . $user->getEmail() . "');");
			}
			
			
			$last_ID = $db->lastInsertId();
			$user->setId($last_ID);
			$user->setPseudo($user->getPseudo());
			$user->setNom($user->getNom());
			$user->setPrenom($user->getPrenom());
			$user->setBirthdate($user->getBirthdate());
			$user->setEmail($user->getEmail());
		
			return $user;

			
	}
	
		
	public function get5Users() {
		
		$userlist = new UserDAO;
		$listeIDs = [];
		$user = [];
			
		$db = SPDO::getInstance();
		$req = $db->query("SELECT id FROM user ORDER BY pseudo LIMIT 0,5");
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

}