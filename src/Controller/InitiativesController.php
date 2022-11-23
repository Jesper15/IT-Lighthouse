<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class InitiativesController extends AbstractController
{
    #[Route('/initiatieven', name: 'app_initiatives')]
    public function AboutUs(): Response
    {
        return $this->render('pages/initiatives.html.twig');
    }
}
