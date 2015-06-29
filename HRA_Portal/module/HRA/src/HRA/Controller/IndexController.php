<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace HRA\Controller;
use HRA\Captcha\CaptchaGenerate;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use HRA\DomainObjects\Users;
use HRA\DAL\UsersDAL;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
       return new ViewModel();
    }

    public function registerAction(){
    	if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        $email=$_POST['email'];
       UsersDAL::insert_DAL($firstname,$lastname,$password,$username,$email);
       return $this->redirect()->toUrl('http://msuhail-001-site3.mywindowshosting.com/public/HRA/index/log');
        }
        return new ViewModel();
    }

    public function logAction(){
    $captcha=CaptchaGenerate::generate();
    if(isset($_POST['captcha']) && isset($_POST['username']) && isset($_POST['password'])){
    if($captcha->isValid($_POST['captcha'])){
 $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');   
        // Do the same you did for the ordinar Zend AuthService 
        $adapter = $authService->getAdapter();
        $adapter->setIdentityValue($_POST['username']); //$data['usr_name']
        $adapter->setCredentialValue($_POST['password']); // $data['usr_password']
        $authResult = $authService->authenticate();
if ($authResult->isValid()) {
  $identity = $authResult->getIdentity();
          $authService->getStorage()->write($identity);
    // print_r ($authService->getIdentity()->getEmail());   
return $this->redirect()->toUrl('http://www.msuhail.hostingsiteforfree.com/wordpress/');  
  
  echo "valid";
}
else echo "invalid";
    }
    else{
        echo "Failure";
        }
}
     $captchaId=$captcha->generate();
     return new ViewModel(array('captcha'=>$captchaId));
    }

}


