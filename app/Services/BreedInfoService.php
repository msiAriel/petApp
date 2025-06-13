<?php

namespace App\Services;

use GuzzleHttp\Client;

class BreedInfoService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchBreedData(string $species, string $breed)
    {
        $species = strtolower($species);
        $apiUrl = null;
        $imageApiUrl = null;

        if ($species === 'dog') {
            $apiUrl = 'https://api.thedogapi.com/v1/breeds/search?q=' . urlencode($breed);
            $imageApiUrl = 'https://api.thedogapi.com/v1/images/search?breed_ids=';
        } elseif ($species === 'cat') {
            $apiUrl = 'https://api.thecatapi.com/v1/breeds/search?q=' . urlencode($breed);
            $imageApiUrl = 'https://api.thecatapi.com/v1/images/search?breed_ids=';
        }

        if (!$apiUrl) {
            return null;
        }

        $response = $this->client->get($apiUrl);
        $breeds = json_decode($response->getBody(), true);

        if (empty($breeds)) {
            return null;
        }

        $breedInfo = $breeds[0];

        $imageUrl = null;
        if (isset($breedInfo['id'])) {
            $imgResponse = $this->client->get($imageApiUrl . $breedInfo['id']);
            $imgData = json_decode($imgResponse->getBody(), true);
            if (!empty($imgData) && isset($imgData[0]['url'])) {
                $imageUrl = $imgData[0]['url'];
            }
        }

        return [
            'temperament' => $breedInfo['temperament'] ?? null,
            'origin' => $breedInfo['origin'] ?? null,
            'image_url' => $imageUrl,
        ];
    }
}
