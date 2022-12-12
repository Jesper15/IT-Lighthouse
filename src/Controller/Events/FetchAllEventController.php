<?php

namespace App\Controller\Events;

use App\Entity\Events;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FetchAllEventController extends AbstractController
{
    public function __construct(
        private readonly ManagerRegistry $doctrine,
    )
    {
    }

    #[Route('/events/', name: 'app_events_fetch_all')]
    #[ParamConverter('events')]
    public function fetchAll(): Response
    {
        $fetchAllEvent = $this->doctrine->getRepository(Events::class)->findAll();

        return $this->render('pages/events/fetch_all_event.html.twig', [
            'event' => $fetchAllEvent,
        ]);
    }
}