<?php

namespace App\Form\News\Handler;

use App\Entity\News;
use App\Form\News\Data\CreateNewsData;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\DateTimeImmutable;

class CreateNewsHandler
{
    public function __construct(
        private EntityManagerInterface $em,
    )
    {}

    public function handle(CreateNewsData $data): News
    {
        $date = new DateTimeImmutable(0);
        $date->format('j-n-Y');

        $news = new News($data->title, $data->description, $date);

//        dd($news);

        $this->em->persist($news);
        $this->em->flush();

        return $news;
    }
}