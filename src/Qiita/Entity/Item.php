<?php

namespace App\Qiita\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Qiita\Provider\ItemProvider;

#[ApiResource(
    operations: [new GetCollection(), new Get()],
    provider: ItemProvider::class
)]
class Item
{
    private string $id;
    private string $title;
    private string $body;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Item
     */
    public function setId(string $id): Item
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Item
     */
    public function setTitle(string $title): Item
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Item
     */
    public function setBody(string $body): Item
    {
        $this->body = $body;
        return $this;
    }


}