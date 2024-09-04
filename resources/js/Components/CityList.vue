<template>
    <div class="loader-container" v-if="loading">
        <div class="loader"></div>
    </div>
    <div class="row mt-4" v-if="cities.length > 0">
        <div class="col-md-6">
            <h4 class="text-white font-weight-bold">Top Destinations in Japan</h4>
        </div>
        <div class="col-md-6 text-right">
            <h6 class="text-white font-weight-bold">{{ date }}</h6>
        </div>
    </div>
    <div class="row">
        <template v-for="(city, index) in cities" :key="index">
            <div class="col-md-4 mb-4">
                <city-card :city="city"></city-card>
            </div>
        </template>
    </div>
</template>

<script>
    import axios from 'axios';
    import {onMounted, ref} from "vue";
    import CityCard from './CityCard.vue';

    export default {
        components: {
            CityCard
        },

        props: {date: String},

        setup(props) {
            const date = props.date;
            const cities = ref([]);
            const loading = ref(false);

            onMounted(() => {
                getCities();
            });

            const getCities = async () => {
                loading.value = true;
                try {
                    await axios.get('/api/cities', {}, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    }).then(response => {
                        cities.value = response?.data;
                        loading.value = false;
                    });
                } catch(error) {
                    loading.value = false;
                }
            };

            return {
                date,
                cities,
                loading
            }
        }
    }
</script>