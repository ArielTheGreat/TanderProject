<?php
	namespace App\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use App\Entity\User;

	class AdminZone extends AbstractController{
		function load(): Response
        {

            $repository = $this->getDoctrine()->getRepository('App:User');
			$users = $repository->findAll();

            $arrayUsers = [];

            for($x = 0;$x < count($users);$x++)
            {
               $variable =  $users[$x]-> getUsername();
               array_push($arrayUsers,$variable);
            }

            return $this -> render('adminZone/adminZone.html.twig',[
                'users' => $arrayUsers
            ]);
        }
	}
?>