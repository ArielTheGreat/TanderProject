<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Entity\User;

class confirmation extends AbstractController{
    public function sendPetition(MailerInterface $mailer)
    {
		$username = strtolower($_POST["username"]);
		$password = $_POST["password"];
		$mail = $_POST["email"];
		$email = (new Email())
            ->from('2bachuwu@gmail.com')
            ->to($mail)
            ->subject('Thank you!')
            ->text("In name of the team of Tander, we would like to congratulate you for trusting in our services, any feedback is welcome".$username.", please make sure to rate our services in the Apple Store/Play Store, so more people can benefit as well. Happy to have you here ".$username ."!")
            ->html('<p>"In name of the team of Tander, we would like to congratulate you for trusting in our services, any feedback is welcome ' . $username . ', please make sure to rate our services in the Apple Store/Play Store, so more people can benefit as well. Happy to have you here '.$username .'!</p>');

        $mailer->send($email);

		$user = new User();

		$user -> setUsername($username);
		$user -> setPassword($password);
		$user -> setEmail($mail);
		$user -> setRoles('user');
		$user -> setStatus('active');
		$user -> setImage('avatar.jpg');

		$em = $this->getDoctrine()->getManager();

        $em->persist($user);
        $em->flush();


		$repository = $this->getDoctrine()->getRepository('App:User');
			$exist = $repository->findOneBy([
				'username' => 'adminedu'
			]);

			if(!$exist)
				{
		$user = new User();

		$user -> setUsername('adminedu');
		$user -> setEmail('ejorx99@gmail.com');
		$user -> setPassword('otayza');
		$user -> setRoles('ADMIN');
		$user -> setStatus('active');
		$user -> setHobbies('Programming, playing videogames and watch anime and series');
		$user -> setCity('Madrid');
		$user -> setAge(21);
		$user -> setImage('otayza.jpg');

		$em = $this->getDoctrine()->getManager();

        $em->persist($user);
        $em->flush();

		$user = new User();

		$user -> setUsername('adminariel');
		$user -> setPassword('ariel');
		$user -> setEmail('2bachuwu@gmail.com');
		$user -> setRoles('ADMIN');
		$user -> setStatus('active');
		$user -> setHobbies('Sports and Party');
		$user -> setCity('Madrid');
		$user -> setAge(19);
		$user -> setImage('ariel.jpg');

		$em = $this->getDoctrine()->getManager();

        $em->persist($user);
        $em->flush();

		$user = new User();

		$user -> setUsername('tester');
		$user -> setPassword('tester');
		$user -> setEmail('tester@gmail.com');
		$user -> setRoles('user');
		$user -> setStatus('active');
		$user -> setHobbies('Testing');
		$user -> setCity('Madrid');
		$user -> setAge(99);
		$user -> setImage('avatar.jpg');

		$em = $this->getDoctrine()->getManager();

        $em->persist($user);
        $em->flush();
				}
		$response = $this->forward('App\Controller\login::login', [
			'name'  => 'h',
		]);
	
		return $response;
}
        }
		?>