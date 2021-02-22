<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class createAccount extends AbstractController{
    public function create(): Response
    {
        return $this -> render('createAccount/create.html.twig',[
            'titulo' => 'Tander',
        ]);
    }
}
?>