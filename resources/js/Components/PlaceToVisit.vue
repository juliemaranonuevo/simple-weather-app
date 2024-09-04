<template>
    <h4 class="mt-5 mb-2 font-weight-bold">
        Places To Visit
    </h4>
    <div class="card mb-2 shadow card-opacity">
        <div class="card-body">
            <template 
                v-for="(place, index) in places" 
                :key="index"
            >
                <place-card :place="place"></place-card>
            </template>
        </div>
    </div>
</template>

<script>
    import PlaceCard from './PlaceCard.vue';
    
    export default {
        components: {
            PlaceCard,
        },

        props: {
            city: String,
            places: Array
        },

        setup(props) {
            const city = props.city;
            const places = props.places;

            return {
                city,
                places
            }
        }
    }
</script>