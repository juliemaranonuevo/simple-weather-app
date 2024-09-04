<?php
namespace App\Services\Interfaces;

use Illuminate\Support\Facades\Http;

interface ApiServiceInterface
{
    public function makeRequest(
        string $domain, 
        array $params = [], 
        string $method = 'GET'
    ): array;
}