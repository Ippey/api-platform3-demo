<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $author1 = new Author();
        $author1
            ->setName('著者1')
        ;
        $manager->persist($author1);
        $author2 = new Author();
        $author2
            ->setName('著者2')
        ;
        $manager->persist($author2);

        $book1 = new Book();
        $book1
            ->setTitle('本1')
            ->setPrice(100)
            ->setIsPublished(true)
            ->setAuthor($author1)
            ;
        $manager->persist($book1);
        $book2 = new Book();
        $book2
            ->setTitle('本2')
            ->setPrice(200)
            ->setIsPublished(false)
            ->setAuthor($author1)
        ;
        $manager->persist($book2);
        $book3 = new Book();
        $book3
            ->setTitle('本3')
            ->setPrice(300)
            ->setIsPublished(true)
            ->setAuthor($author2)
        ;
        $manager->persist($book3);

        $manager->flush();
    }
}
