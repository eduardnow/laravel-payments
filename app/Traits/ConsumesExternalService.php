<?php


namespace App\Traits;


use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function makeRequest($method, $uri, $queryParams = [], $formParams = [], $headers = [], $isJson = false)
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if (method_exists($this, 'resolveAuthorization')) {
            $this->resolveAuthorization($queryParams, $formParams, $headers);
        }

        $response = $client->request($method, $uri, [
            $isJson ? 'json' : 'form_params' => $formParams,
            'headers' => $headers,
            'query' => $queryParams,
        ]);

        if (method_exists($this, 'decodeResponse')) {
            $this->decodeResponse($response);
        }

        return $response;
    }
}
