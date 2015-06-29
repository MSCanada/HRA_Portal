<?php
namespace HRA\DAL;
use HRA\DomainObjects\Users;

class UsersDAL{
	private function setup(){
		$entityManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
            return $entityManager;
	}

public function insert_DAL($firstname,$lastname,$password,$username,$email){
	  $user= Users::getUser($firstname,$lastname,$password,$username,$email);
	   $RegisteredUsers=new \HRA\Entity\Registeredusers();
       $RegisteredUsers->setFirstname($user->firstname);
       $RegisteredUsers->setLastname($user->lastname);
       $RegisteredUsers->setPassword($user->password);
       $RegisteredUsers->setUsername($user->username);
       $RegisteredUsers->setEmail($user->email);
       $entityManager=UsersDAL::setup();
       $entityManager->persist($RegisteredUsers);
       $entityManager->flush();
}


}

?>
