<?php

namespace App\Controller\Events;

use App\Enum\FlashType;
use App\Form\Events\Data\CreateEventsData;
use App\Form\Events\Handler\CreateEventsHandler;
use App\Form\Events\Type\CreateEventsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateEventController extends AbstractController
{
    public function __construct(
        private readonly CreateEventsHandler $handler
    )
    {
    }

    #[Route('/event/create', name: 'app_event_create')]
    public function CreateEvent(Request $request): Response
    {
        $data = new CreateEventsData();
        $form = $this->createForm(CreateEventsType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->handler->handle($data);
            $this->addFlash(FlashType::SUCCESS->value, 'Het formulier is succesvol verzonden');

            return $this->redirectToRoute('app_home');
        }


        return $this->renderForm('pages/user/create.html.twig', [
            'form' => $form,
        ]);
    }
}