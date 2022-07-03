<?php

namespace App\Qiita\Provider;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Qiita\Entity\Item;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ItemProvider implements ProviderInterface
{
    private $baseUrl = 'https://qiita.com';

    public function __construct(private HttpClientInterface $httpClient, private string $token)
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = [])
    {

        if ($operation instanceof CollectionOperationInterface) {
            return $this->getItems(); // Qiitaから自分の投稿リスト取得してEntityの配列を返す（/api/itemsの処理）
        }

        return $this->getItem($uriVariables['id']); // Qiitaから該当の投稿取得してEntityを返す（/api/items/{id}の処理）
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    private function getItems()
    {
        $items = [];
        $response = $this->httpClient->request('GET', $this->baseUrl . '/api/v2/authenticated_user/items', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ],
        ]);
        $json = json_decode($response->getContent());
        foreach ($json as $row ) {
            $item = new Item();
            $item
                ->setId($row->id)
                ->setTitle($row->title)
                ->setBody($row->body)
                ;
            $items[] = $item;
        }

        return $items;
    }

    private function getItem(string $id) {
        $response = $this->httpClient->request('GET', $this->baseUrl . '/api/v2/items/' . $id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ],
        ]);
        $json = json_decode($response->getContent());
        $item = new Item();
        $item
            ->setId($json->id)
            ->setTitle($json->title)
            ->setBody($json->body);

        return $item;
    }
}