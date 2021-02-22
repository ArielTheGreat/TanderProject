<?php
	namespace App\Controller;

	use App\Entity\User;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


	class loginAccount extends AbstractController{
		function login()
		{
			$username = strtolower($_POST["username"]);
			$password = $_POST["password"];

			$repository = $this->getDoctrine()->getRepository('App:User');
			$user = $repository->findOneBy([
				'username' => $username,
				'password' => $password,
			]);
			$status = $user->getStatus();
			if(!$user || $status == "BLOCKED")
			{
				$response = $this->forward('App\Controller\login::login');			
				return $response;
			}
			else{
				$user = $repository->findOneBy([
					'username' => $username
				]);
				$role = $user -> getRoles();
				$avatar = $user->getImage();

				if($role == 'user')
				{
					return $this -> render('welcome/welcome.html.twig',[
						'user' => $username,
						'avatar' => $avatar
					]);
				}else{
					return $this -> render('welcome/welcomeAdmin.html.twig',[
						'user' => $username,
						'avatar' => $avatar
					]);
				}
			}
		}
	}
?>