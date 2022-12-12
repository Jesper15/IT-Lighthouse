<?php

namespace App\Controller\News;

use App\Entity\News;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

class FetchOneNewsController extends AbstractController
{
    #[Route('/news/{id}', name: 'app_news_fetch_one')]
    public function fetchOne(ManagerRegistry $registry, int $id): Response
    {
        $news = $registry->getRepository(News::class)->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'Er is geen nieuws gevonden' . $id
            );
        }

        return $this->render('pages/news/news_one.html.twig', [
           'news' => $news
        ]);
    }
}
