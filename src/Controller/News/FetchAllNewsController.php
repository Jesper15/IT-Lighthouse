<?php

namespace App\Controller\News;

use App\Entity\News;
use Doctrine\Persistence\ManagerRegistry;
use Monolog\DateTimeImmutable;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FetchAllNewsController extends AbstractController
{
    public function __construct(
        private readonly ManagerRegistry $doctrine,
    )
    {
    }

    #[Route('/news/', name: 'app_news_fetch_all')]
    #[ParamConverter('news' )]
    public function fetchAll(): Response
    {
        $fetchAllNews = $this->doctrine->getRepository(News::class)->findAll();

        return $this->render('pages/news/fetch_all_news.html.twig', [
            'news' => $fetchAllNews,
        ]);
    }
}