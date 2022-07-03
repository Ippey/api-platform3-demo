<?php

namespace App\Dto;

use App\Entity\Author;

class BookDto
{
    private string $title;
    private int $price;
    private Author $author;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return BookDto
     */
    public function setTitle(string $title): BookDto
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return BookDto
     */
    public function setPrice(int $price): BookDto
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     * @return BookDto
     */
    public function setAuthor(Author $author): BookDto
    {
        $this->author = $author;
        return $this;
    }


}