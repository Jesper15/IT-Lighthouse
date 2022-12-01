<?php

namespace App\Controller\News;

use App\Entity\News;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FetchNews extends AbstractController
{
    #[Route('/news/{id}', name: 'app_news_fetch')]
    public function fetch(ManagerRegistry $registry, int $id): Response
    {
        $news = $registry->getRepository(News::class)->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'Er is geen nieuws gevonden' . $id
            );
        }

//        dd($news);

//        return new Response('Nieuws: ' . $news->getTitle());

        return $this->render('pages/news/news_one.html.twig', [
           'news' => $news
        ]);
    }
}
