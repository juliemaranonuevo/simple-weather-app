<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Services\Interfaces\ApiServiceInterface;
use Illuminate\Http\Client\RequestException;

class ApiService implements ApiServiceInterface
{
    public function makeRequest(
        string $domain, 
        array $params = [], 
        string $method = 'GET'
    ): array {
        $response = Http::$method($domain, $params);

        if ($response->failed()) {
            throw new RequestException($response);
        }

        return $response->json();
    }
}