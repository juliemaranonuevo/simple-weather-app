<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

class PlaceService
{
    protected string $apiKey;
    protected string $domain;
    protected ApiService $apiService;
    protected string $endpointAndVersion = '/v2/places';

    public function __construct(ApiService $apiService)
    {
        $this->apiKey = config('services.place.key');
        $this->domain = config('services.place.domain') . $this->endpointAndVersion;
        $this->apiService = $apiService;
    }

    public function getPlaces(string $placeId): array
    {
        $data = $this->apiService->makeRequest(
            $this->domain, 
            [
                'categories' => 'commercial,accommodation,activity',
                'limit' => 5,
                'filter' => 'place:' . $placeId,
                'apiKey' => $this->apiKey
            ]
        );
        
        return $data;
    }
}