import './bootstrap';
import { createApp } from 'vue'
import PlaceDetails from './Components/PlaceDetails.vue';
import CityList from './Components/CityList.vue';

const app = createApp({});
app.component('place-details', PlaceDetails);
app.component('city-list', CityList);
app.mount('#app');