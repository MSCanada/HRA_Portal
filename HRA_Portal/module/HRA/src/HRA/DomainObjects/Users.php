<?php
namespace HRA\DomainObjects;

 class  Users{
 	private static $user;

private function Users(){

}

private function getInstance(){
	if(!isset(Users::$user)){
		Users::$user=new Users();
	}
	else{
		Users::$user=null;
	}
	return Users::$user;
}

public static function getUser($firstname,$lastname,$password,$username,$email){
$User=Users::getInstance();
if($User!=null){
$User->firstname=$firstname;
$User->lastname=$lastname;
$User->password=$password;
$User->username=$username;
$User->email=$email;
}
echo "reached";
return $User;

}

}

?>