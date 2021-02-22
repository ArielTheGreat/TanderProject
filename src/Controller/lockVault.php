<?php
    namespace App\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use App\Entity\User;

    class lockVault extends AbstractController
    {
        function proceed()
        {
            $user = $_POST["username"];

            $words = explode(':',$user);

            $username = $words[1];

            $repository = $this->getDoctrine()->getRepository('App:User');
			$user = $repository->findOneBy([
				'username' => $username
			]);
            $status = $user->getStatus();

            if($status == 'active')
            {
                $user-> setStatus('BLOCKED');
                $em = $this->getDoctrine()->getManager();
                $em->flush();  
            }else{
                $user-> setStatus('active');
                $em = $this->getDoctrine()->getManager();
                $em->flush();        
            }
            $response = $this->forward('App\Controller\AdminZone::load');
            
            return $response;
        }
    }
?>