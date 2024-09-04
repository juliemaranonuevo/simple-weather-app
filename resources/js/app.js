import './bootstrap';
import { createApp } from 'vue'
import PlaceDetails from './Components/PlaceDetails.vue';
import CityList from './Components/CityList.vue';
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

const app = createApp({});

app.provide('$swal', Swal);
app.component('place-details', PlaceDetails);
app.component('city-list', CityList);
app.mount('#app');