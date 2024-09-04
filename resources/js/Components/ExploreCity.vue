<template>
    <div class="card mb-2 shadow card-opacity">
        <div class="card-body">
            <h4 class="font-weight-bold">Explore More Cities</h4>
            <ul class="city-list">
                <template v-for="cityName in cities" :key="cityName">
                    <li v-if="cityName !== city" @click="goTo(cityName)">
                        <span>{{ cityName }}</span>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</template>

<script>    
    export default {
        props: {
            city: String,
            cities: Array
        },

        setup(props) {
            const city = props.city;
            const cities = props.cities;

            return {
                city,
                cities
            }
        }
    }
</script>

<style>
    .city-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .city-list li {
        padding: 10px 0;
        border-bottom: 1px solid #ccc; 
        cursor: pointer;
    }

    .city-list li span {
        font-weight: bold;
        margin-left: 10px;
    }

    .city-list li:last-child {
        border-bottom: none;
    }

    .city-list li:hover {
        background-color: #0C8FC4;
    }
</style>