<?php

namespace App\Form\News\Data;

use Monolog\DateTimeImmutable;

class CreateNewsData
{
    public ?string $title;

    public ?string $description;

    public DateTimeImmutable $date_created;

    public function __construct()
    {
        $this->title = null;
        $this->description = null;
//        $this->date_created = DateTimeImmutable::class;
    }
}