<?php
namespace App\Services;

class CityService
{
    protected array $cities;
    protected WeatherService $weatherService;
    protected GeocodeService $geocodeService;
    protected PlaceService $placeService;

    public function __construct(
        WeatherService $weatherService, 
        GeocodeService $geocodeService,
        PlaceService $placeService,
    ) {
        $this->cities = [
            "Tokyo",
            "Yokohama",
            "Kyoto",
            "Osaka",
            "Sapporo",
            "Nagoya"
        ];

        $this->weatherService = $weatherService;
        $this->geocodeService = $geocodeService;
        $this->placeService = $placeService;
    }

    public function getCities(): array
    {
        return $this->cities;
    }

    public function getCityPlaces(string $city): array
    {
        $placeId = $this->geocodeService->getPlaceId($city . ',JP');
        $places = $this->placeService->getPlaces($placeId);
        $placesList = [];

        foreach ($places['features'] as $key => $place) {
            $properties = $place['properties'];
            $placesList[] = [
                'name' => $properties['name'] ?? null,
                'englishName' => $properties['name_international']['en'] ?? null,
                'country' => $properties['country'] ?? null,
                'country_code' => $properties['country_code'] ?? null,
                'city' => $properties['city'] ?? null,
                'postcode' => $properties['postcode'] ?? null,
                'district' => $properties['district'] ?? null,
                'suburb' => $properties['suburb'] ?? null,
                'street' => $properties['street'] ?? null,
                'lon' => $properties['lon'] ?? null,
                'lat' => $properties['lat'] ?? null,
                'formatted' => $properties['formatted'] ?? null,
                'datasource' => $properties['datasource'] ?? null,
            ];
        }

        return $placesList;
    }

    public function getCitiesWithWeather(): array 
    {
        $citiesWithWeather = [];

        foreach ($this->cities as $city) {
            $forecast = $this->weatherService->getForecast($city . ',JP');
            $currenWeather = $this->weatherService->getCurrentWeather($forecast['list']);
            
            $citiesWithWeather[] = [
                'city' => $forecast['city']['name'],
                'weather' => $currenWeather
            ];
        }

        return $citiesWithWeather;
    }
}