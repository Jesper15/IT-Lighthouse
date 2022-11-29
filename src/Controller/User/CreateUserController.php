<?php

namespace App\Controller\User;

use App\Controller\Form\User\Data\CreateUserData;
use App\Controller\Form\User\Handler\CreateUserHandler;
use App\Enum\FlashType;
use App\Type\CreateUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateUserController extends AbstractController
{
    public function __construct(
        private CreateUserHandler $handler
    )
    {}

    #[Route('/user/create')]
    public function handleRequest(Request $request): Response
    {
        $data = new CreateUserData();
        $form = $this->createForm(CreateUserType::class, $data);
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