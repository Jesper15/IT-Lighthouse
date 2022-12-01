<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;
use Monolog\DateTimeImmutable;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @var \DateTimeImmutable
     */
    #[ORM\Column]
    private \DateTimeImmutable $dateCreated;

    /**
     * @param DateTimeImmutable $dateCreated
     */
    public function __construct(
        string $title,
        string $description,
        DateTimeImmutable $dateCreated
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->dateCreated = $dateCreated;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateCreated(): \DateTimeImmutable
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTimeImmutable $dateCreated
     */
    public function setDateCreated(\DateTimeImmutable $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }
}
