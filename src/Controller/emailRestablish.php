<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Mailer\MailerInterface;
    use Symfony\Component\Mime\Email;
    use App\Entity\User;
    use App\Entity\RecoveryCodes;

    class emailRestablish extends AbstractController{
        public function sendEmailRestablish(MailerInterface $mailer)
        {
            if(isset($_POST["username"]) and isset($_POST["email"])){
                $username=$_POST["username"];
                $mail=$_POST["email"];
                
                $repository = $this->getDoctrine()->getRepository('App:User');
                $user = $repository->findOneBy([
                    'username' => $username
                ]);
                
                if(!$user){
                    
                    $response = $this->forward('App\Controller\restablishPassword::load');
            
                    return $response;
                }else{
        
                $code=random_int(123456,999999);
                $message = "Hi " . $username . ", save this code to recover your password: ".$code ;

                $repository2 = $this->getDoctrine()->getRepository('App:RecoveryCodes');
                $repeatedEmail = $repository2->findOneBy([
                    'email' => $mail
                ]);
                if(!$repeatedEmail)
                {
                $recovery = new RecoveryCodes();

                $recovery -> setRecoveryCode($code);
                $recovery -> setEmail($mail);

                $em = $this->getDoctrine()->getManager();

                $em->persist($recovery);
                $em->flush();
                }else{
                    $repeatedEmail->setRecoveryCode($code);
                    $em = $this->getDoctrine()->getManager();

                    $em->flush();
                }
        
                $email = (new Email())
                ->from('2bachuwu@gmail.com')
                ->to($mail)
                ->subject('Password Recovery')
                ->text($message)
                ->html('<p>'.$message.'</p>');

                $mailer->send($email);
                
                $response = $this->forward('App\Controller\restablishPassword::load');
            
                return $response;
                }
                }
        }
    }
?>