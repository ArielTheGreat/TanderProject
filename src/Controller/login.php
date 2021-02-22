<?php
    namespace App\Controller;
    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;

    class login extends AbstractController{
        public function login(): Response
        {
            return $this -> render('login/login.html.twig',[
                'titulo' => 'Tander',
            ]);
        }
    }
?>