<template>
    <div class="card card-city shadow card-opacity">
        <div class="card-body">
            <div class="text-center">
                <h2>{{ city.city }}</h2>
                <h1 class="display-4 font-weight-bold">
                    {{ city.weather ? kelvinToCelsius(city.weather.main.temp) : 'Fetching...' }}
                </h1>
                <p class="card-text text-capitalize">
                    <img 
                        v-if="city.weather"
                        :src="weatherIcon(city.weather.weather[0].icon)" 
                        alt="Weather Icon" 
                        width="50" 
                        height="50"
                    >
                    <span class="mt-2">
                        {{ city.weather ? city.weather.weather[0].description : 'Fetching...' }}
                    </span>
                </p>
                <div class="weather-details">
                    <p>{{ calculateRainChance(city.weather.pop) }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a :href="'/' + city.city" class="btn view-city">View</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {city: Object},
        setup(props) {
            const city = props.city;
            
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
                weatherIcon,
                kelvinToCelsius,
                calculateRainChance
            }
        }
    }
</script>

<style>
    .card-city .card-body img {
        filter: drop-shadow(2px 2px 2px #000);
    }
</style>