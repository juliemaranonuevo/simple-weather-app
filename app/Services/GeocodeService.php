<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

class GeocodeService
{
    protected string $apiKey;
    protected string $domain;
    protected ApiService $apiService;
    protected string $endpointAndVersion = '/v1/geocode/search';

    public function __construct(ApiService $apiService)
    {
        $this->apiKey = config('services.place.key');
        $this->domain = config('services.place.domain') . $this->endpointAndVersion;
        $this->apiService = $apiService;
    }

    public function getPlaceId(string $city): string
    {
        $data = $this->apiService->makeRequest(
            $this->domain, 
            [
                'text' => $city,
                'format' => 'json',
                'apiKey' => $this->apiKey
            ]
        );
        
        return $data['results'][0]['place_id'];
    }
}