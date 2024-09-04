<template>
    <div class="card mb-2 shadow card-opacity">
        <div class="card-body">
            <div class="current-weather text-center">
                <h2>{{ city }}</h2>
                <h1 class="display-4 font-weight-bold">
                    {{ currentWeather.main ? kelvinToCelsius(currentWeather.main.temp) : 'Fetching...' }}
                </h1>
                <p class="text-capitalize">
                    <img 
                        v-if="currentWeather.weather"
                        :src="weatherIcon(currentWeather.weather[0].icon)" 
                        alt="Weather Icon" 
                        width="50" 
                        height="50"
                    >
                    {{ currentWeather.weather ? currentWeather.weather[0].description : 'Fetching...' }},
                    {{ currentWeather.day }}
                </p>
                <div class="weather-details">
                    <p>{{ calculateRainChance(currentWeather.pop) }}</p>
                </div>
            </div>
            <div class="forecast mt-5">
                <div class="row text-center">
                    <template v-for="(weather, index) in todayForecast" :key="index">
                        <div class="col-12 col-md mb-2 mt-2 m-1">
                            <div class="box p-3 border rounded-0 shadow">
                                <img 
                                    v-if="weather.weather"
                                    :src="weatherIcon(weather.weather[0].icon)" 
                                    alt="Weather Icon" 
                                    width="50" 
                                    height="50"
                                >
                                <p class="font-weight-bold time">{{ weather.time }}</p>
                                <p>{{ kelvinToCelsius(weather.main.temp) }}</p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            city: String,
            currentWeather: Object,
            todayForecast: Array
        },

        setup(props) {
            const city = props.city;
            const currentWeather = props.currentWeather;
            const todayForecast = props.todayForecast;

            const weatherIcon = (icon) => {
                return 'http://openweathermap.org/img/wn/' + icon + '.png';
            }

            const kelvinToCelsius = (kelvin) => {
                const temp = kelvin - 273.15;
                return `+${temp.toFixed(2)} °C`;
            }

            const calculateRainChance = (chance) => {
                if (!chance) {
                    return 'No chance of rain';
                } else {
                    return `${(chance * 100)}% chance of rain`;
                }
            }

            return {
                city,
                currentWeather,
                todayForecast,
                weatherIcon,
                kelvinToCelsius,
                calculateRainChance
            }
        }
    }
</script>

<style>
    .forecast .col {
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.2);
    }

    .forecast img {
        filter: drop-shadow(2px 2px 2px #000);
    }

    .current-weather img {
        filter: drop-shadow(2px 2px 2px #000);
    }

    .forecast .time {
        font-weight: bold;
        font-size: 18px;
    }
</style>