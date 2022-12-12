<?php

namespace App\Controller\Events;

use App\Entity\Events;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FetchOneEventController extends AbstractController
{
    #[Route('/event/{id}', name: 'app_event_fetch_one')]
    public function fetchOne(ManagerRegistry $registry, int $id): Response
    {
        $event = $registry->getRepository(Events::class)->find($id);

        if (!$event) {
            throw $this->createNotFoundException(
                'Er is geen nieuws gevonden' . $id
            );
        }

        return $this->render('pages/events/event_one.html.twig', [
           'event' => $event
        ]);
    }
}
