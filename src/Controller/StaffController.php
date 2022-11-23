<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaffController extends AbstractController
{
    #[Route(path: '/bestuursleden', name: 'app_staff')]
    public function Staff(): Response
    {
        return $this->render('pages/staff.html.twig');
    }
}