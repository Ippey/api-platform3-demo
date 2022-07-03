<?php

namespace App\Processor;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

class BookProcessor implements ProcessorInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {

    }
    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        $book = new Book();
        $book
            ->setTitle($data->getTitle() . 'いじったよ')
            ->setPrice($data->getPrice())
            ->setAuthor($data->getAuthor())
            ->setIsPublished(false)
            ;
        $this->entityManager->persist($book);
        $this->entityManager->flush();
        return $book;
    }

}