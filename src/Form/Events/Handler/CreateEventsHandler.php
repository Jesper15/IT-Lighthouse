<?php

namespace App\Form\Events\Handler;

use App\Entity\Events;
use App\Form\Events\Data\CreateEventsData;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateEventsHandler extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $em,
    )
    {}

    public function Handle(CreateEventsData $data) {

        $events = new Events($data->title, $data->description, $data->address, new DateTimeImmutable((bool)$data->dateTime));

//        dd($events);

        $this->em->persist($events);
        $this->em->flush();
    }
}
