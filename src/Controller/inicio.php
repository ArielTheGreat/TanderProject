<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class inicio extends AbstractController{
    public function index(): Response
    {
        return $this -> render('inicio/index.html.twig',[
            'titulo' => 'Tander',
        ]);
    }
}
?>