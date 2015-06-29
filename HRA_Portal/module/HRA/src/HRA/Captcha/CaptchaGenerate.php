<?php
namespace HRA\Captcha;
use Zend\Captcha\Image;
class CaptchaGenerate{

	public function CaptchaGenerate(){
	}

	public function generate(){
	    $captcha=new Image();
        $captcha->setWordLen('4')
        ->setHeight('60')
        ->setFont('./data/arial.ttf')
        ->setImgDir('./public/img/captcha')
        ->setDotNoiseLevel('5') 
        ->setLineNoiseLevel('5');
        return $captcha;
}




	
}



?>