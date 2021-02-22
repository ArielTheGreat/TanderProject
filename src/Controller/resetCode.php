<?php
namespace App\Controller;

use App\Entity\RecoveryCodes;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class resetCode extends AbstractController{
    function reset()
    {
    if(isset($_POST["code"])){
        $code=$_POST["code"];
        $newPassword=$_POST["newPassword"];


        $repository1 = $this->getDoctrine()->getRepository('App:RecoveryCodes');
        $repository2 = $this->getDoctrine()->getRepository('App:User');
        $recoveryEmail = $repository1->findOneBy(['recovery_code'=>$code]);

        $emailObtained = $recoveryEmail->getEmail();

        $changePassword = $repository2->findOneBy(['email'=>$emailObtained]);

        $changePassword->setPassword($newPassword);
        $em = $this->getDoctrine()->getManager();
        $em->flush();        

        $response = $this->forward('App\Controller\login::login');			
		return $response;

    }
}
}
?>