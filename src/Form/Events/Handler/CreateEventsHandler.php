<?php

namespace App\Form\Events\Handler;

use App\Entity\Events;
use App\Form\Events\Data\CreateEventsData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateEventsHandler extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly CreateEventsData $data
    )
    {}

    public function Handle() {
        $events = new Events($this->data->title, $this->data->description, $this->data->address, $this->data->dateTime);

        $this->em->persist($events);
        $this->em->flush();
    }
}