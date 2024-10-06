<?php

namespace App\Services;

use GuzzleHttp\Client;

class APIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('PLANETS_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://api.api-ninjas.com/v1/planets', // Set the base URL for the external API
            'timeout'  => 5.0, // Timeout for API requests
            'headers' => [
                'X-Api-Key' => $this->apiKey
            ]
        ]);
    }

    // Example of a GET request


        public function getPlanets($planet)
    {
        try {
            $response = $this->client->request('GET', '/v1/planets', [
                'query' => ['name' => $planet]
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Log the error or return a user-friendly message
            return ['error' => 'Failed to fetch data.'];
        }
    }


    // Example of a POST request
    public function postExampleData($payload)
    {
        $response = $this->client->request('POST', '/data/endpoint', [
            'json' => $payload // Send data as JSON
        ]);

        return json_decode($response->getBody(), true);
    }
}
