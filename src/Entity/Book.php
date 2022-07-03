<?php

namespace App\Entity;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource]
#[ApiResource(
    uriTemplate: '/authors/{authorId}/books',
    operations: [new GetCollection()],
    uriVariables: ['authorId' => new Link(toProperty: 'author', fromClass: Author::class)]
)]
#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['author'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['author'])]
    private $title;

    #[ORM\Column(type: 'boolean')]
    #[Groups(['author'])]
    private $isPublished;

    #[ORM\Column(type: 'integer')]
    #[Groups(['author'])]
    private $price;

    #[ORM\ManyToOne(targetEntity: Author::class, inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    private $author;
    public function getId() : ?int
    {
        return $this->id;
    }
    public function getTitle() : ?string
    {
        return $this->title;
    }
    public function setTitle(string $title) : self
    {
        $this->title = $title;
        return $this;
    }
    public function isIsPublished() : ?bool
    {
        return $this->isPublished;
    }
    public function setIsPublished(bool $isPublished) : self
    {
        $this->isPublished = $isPublished;
        return $this;
    }
    public function getPrice() : ?int
    {
        return $this->price;
    }
    public function setPrice(int $price) : self
    {
        $this->price = $price;
        return $this;
    }
    public function getAuthor() : ?Author
    {
        return $this->author;
    }
    public function setAuthor(?Author $author) : self
    {
        $this->author = $author;
        return $this;
    }
}
