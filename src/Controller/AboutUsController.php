<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends AbstractController
{
    #[Route('/over-ons', name: 'app_about_us')]
    public function AboutUs(): Response
    {
        return $this->render('pages/aboutus.html.twig');
    }
}