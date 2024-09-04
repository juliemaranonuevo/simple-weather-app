<template>
    <div class="row mt-2" v-if="!loading">
        <div class="col-md-8">
            <today-weather 
                :city="city" 
                :current-weather="currentWeather" 
                :today-forecast="todayForecast"
            ></today-weather>
            <five-day-forecast 
                :city="city" 
                :five-days-forecast="fiveDaysForecast"
            ></five-day-forecast>
            <place-to-visit 
                :city="city" 
                :places="places"
            ></place-to-visit>
        </div>
        <div class="col-md-4">
            <explore-city 
                :city="city"
                :cities="cities"
            ></explore-city>
        </div>
    </div>
    <div class="loader-container" v-if="loading">
        <div class="loader"></div>
    </div>
</template>

<script>
    import axios from 'axios';
    import {onMounted, ref} from "vue";
    import TodayWeather from './TodayWeather.vue';
    import FiveDayForecast from './FiveDayForecast.vue';
    import PlaceToVisit from './PlaceToVisit.vue';
    import ExploreCity from './ExploreCity.vue';
    import { inject } from 'vue';

    export default {
        components: {
            TodayWeather,
            FiveDayForecast,
            PlaceToVisit,
            ExploreCity
        },

        props: {city: String},

        setup(props) {
            const loading = ref(false);
            const city = props.city;
            const places = ref([]);
            const cities = ref([]);
            const currentWeather = ref({});
            const todayForecast = ref([]);
            const fiveDaysForecast = ref([]);
            const swal = inject('$swal');
            
            onMounted(() => {
                getPlaces();
            });

            const getPlaces = async () => {
                loading.value = true;
                try {
                    await axios.get('/api/cities/' + city).then(response => {
                        places.value = response?.data.places;
                        cities.value = response?.data.cities;
                        currentWeather.value = response?.data.currentWeather;
                        todayForecast.value = response?.data.todayForecast;
                        fiveDaysForecast.value = response?.data.fiveDaysForecast;
                        loading.value = false;
                    });
                } catch(error) {
                    loading.value = false;
                    swal.fire({
                        title: error.code,
                        text: error.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            };

            return {
                loading,
                places,
                cities,
                currentWeather,
                todayForecast,
                fiveDaysForecast
            }
        }
    }
</script>