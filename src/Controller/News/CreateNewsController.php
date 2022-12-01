<?php

namespace App\Controller\News;

use App\Enum\FlashType;
use App\Form\News\Data\CreateNewsData;
use App\Form\News\Handler\CreateNewsHandler;
use App\Type\CreateNewsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateNewsController extends AbstractController
{
    public function __construct(
        private readonly CreateNewsHandler $handler
    )
    {}

    #[Route('/news/create', name: 'app_create_news')]
    public function CreateNews(Request $request): Response
    {
        $data = new CreateNewsData();
        $form = $this->createForm(CreateNewsType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->handler->handle($data);
            $this->addFlash(FlashType::SUCCESS->value, 'Het formulier is succesvol verzonden');

            return $this->redirectToRoute('app_home');
        }

        return $this->renderForm('pages/news/create_news.html.twig', [
            'form' => $form,
        ]);
    }
}
