<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

class WeatherService
{
    protected string $apiKey;
    protected string $domain;
    protected ApiService $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiKey = config('services.weather.key');
        $this->domain = config('services.weather.domain');
        $this->apiService = $apiService;
    }

    public function getForecast(string $city): array
    {
        $data = $this->apiService->makeRequest(
            $this->domain, 
            [
                'q' => $city,
                'appid' => $this->apiKey
            ]
        );
        
        return $data;
    }

    public function getCurrentWeather(array $list): array
    {
        $currentDateTime = Carbon::now();
        $closestDateTime = null;
        $smallestDifference = PHP_INT_MAX;
        $currenWeather = [];

        foreach ($list as $item) {
            $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $item['dt_txt']);
            $difference = $currentDateTime->diffInMinutes($dateTime, false);

            if (abs($difference) < $smallestDifference) {
                $smallestDifference = abs($difference);
                $currenWeather = $item;
                $currenWeather['day'] = $dateTime->format('l');
                $currenWeather['time'] = $dateTime->format('h A');
            }
        }

        return $currenWeather;
    }

    public function getFiveDaysForecast(array $list): array
    {
        $fiveDaysForecast = [];

        foreach ($list as $item) {
            $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $item['dt_txt']);
            if ($dateTime->format('H:i:s') === '00:00:00') {
                $fiveDaysForecast[] = array_merge($item, [
                    'day' => $dateTime->format('l'),
                    'time' => $dateTime->format('h A'),
                ]);
            }
        }

        return $fiveDaysForecast;
    }

    public function getTodayForecast(array $list): array
    {
        $currentDate = Carbon::now()->toDateString();
        $todayForcast = [];

        foreach ($list as $item) {
            $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $item['dt_txt']);
            if ($dateTime->toDateString() === $currentDate) {
                $todayForcast[] = array_merge($item, [
                    'day' => $dateTime->format('l'),
                    'time' => $dateTime->format('h A'),
                ]);
            }
        }

        return $todayForcast;
    }
}