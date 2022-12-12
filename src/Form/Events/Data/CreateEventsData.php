<?php

namespace App\Form\Events\Data;

use Monolog\DateTimeImmutable;

class CreateEventsData
{
    public ?string $title;

    public ?string $description;

    public ?string $address;

    public ?DateTimeImmutable $dateTime;

    public function __construct()
    {
        $this->title = null;
        $this->description = null;
        $this->address = null;
        $this->dateTime = null;
    }
}