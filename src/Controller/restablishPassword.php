<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;

    class restablishPassword extends AbstractController{
        public function load(): Response
        {
            return $this -> render('restablish/restablishPassword.html.twig',[
                'titulo' => 'Tander',
            ]);
        }
    }
?>