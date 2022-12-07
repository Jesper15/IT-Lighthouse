<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\ORM\Mapping as ORM;
use Monolog\DateTimeImmutable;

#[ORM\Entity(repositoryClass: EventsRepository::class)]
class Events
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title;

    #[ORM\Column(length: 255)]
    private ?string $address;

    #[ORM\Column(length: 255)]
    private ?string $description;

    #[ORM\Column]
    private ?\DateTimeImmutable $datetime;

    public function __construct(
        string $title,
        string $description,
        string $address,
        DateTimeImmutable $datetime
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->address = $address;
        $this->datetime = $datetime;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDatetime(): ?\DateTimeImmutable
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeImmutable $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }
}
