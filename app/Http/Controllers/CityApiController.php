<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CityService;
use App\Services\WeatherService;

class CityApiController extends Controller
{
    protected $cityService;
    protected $weatherService;

    public function __construct(
        CityService $cityService, 
        WeatherService $weatherService
    ) {
        $this->cityService = $cityService;
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        $cities = $this->cityService->getCitiesWithWeather();
    
        return response()->json($cities);
    }

    public function show($city)
    {
        $cities = $this->cityService->getCities();
        $places = $this->cityService->getCityPlaces($city);
        $forecast = $this->weatherService->getForecast($city . ',JP');
        $currentWeather = $this->weatherService->getCurrentWeather($forecast['list']);
        $todayForecast = $this->weatherService->getTodayForecast($forecast['list']);
        $fiveDaysForecast = $this->weatherService->getFiveDaysForecast($forecast['list']);

        return response()->json([
            'places' => $places,
            'cities' => $cities,
            'currentWeather' => $currentWeather,
            'todayForecast' => $todayForecast,
            'fiveDaysForecast' => $fiveDaysForecast,
        ]);
    }
}
