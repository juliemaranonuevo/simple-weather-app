<template>
    <h4 class="mt-5 mb-2 font-weight-bold">5-Day Forecast</h4>
    <div class="card shadow card-opacity">
        <div class="card-body mb-0 five-day-forecast">
            <template v-for="(forecast, index) in fiveDaysForecast" :key="index">
                <div class="row mt-1 justify-content-center">
                    <div class="col-12 col-md-3 mb-3 text-lg-left text-center font-weight-bold text-dark">
                        <span class="font-weight-bold">
                            {{ forecast.day }}
                        </span>
                    </div>
                    <div class="col-12 col-md-3 mb-3 text-lg-left text-center">
                        <img 
                            v-if="forecast.weather"
                            :src="weatherIcon(forecast.weather[0].icon)" 
                            alt="Weather Icon" 
                            width="50" 
                            height="50"
                        >
                    </div>
                    <div class="col-12 col-md-3 mb-3 text-lg-left text-center">
                        L: {{ kelvinToCelsius(forecast.main.temp_min) }}
                    </div>
                    <div class="col-12 col-md-3 mb-3 text-lg-left text-center">
                        H: {{ kelvinToCelsius(forecast.main.temp_max) }}
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            city: String,
            todayForecast: Array,
            fiveDaysForecast: Array
        },

        setup(props) {
            const city = props.city;
            const todayForecast = props.todayForecast;
            const fiveDaysForecast = props.fiveDaysForecast;

            const weatherIcon = (icon) => {
                return 'http://openweathermap.org/img/wn/' + icon + '.png';
            }

            const kelvinToCelsius = (kelvin) => {
                const temp = kelvin - 273.15;
                return `+${temp.toFixed(2)} °C`;
            }

            return {
                city,
                todayForecast,
                fiveDaysForecast,
                weatherIcon,
                kelvinToCelsius
            }
        }
    }
</script>

<style>
    .five-day-forecast img {
        filter: drop-shadow(2px 2px 2px #000);
    }
</style>