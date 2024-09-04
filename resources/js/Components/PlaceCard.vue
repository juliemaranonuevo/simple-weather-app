<template>
    <div class="card mb-2 card-opacity border">
        <div class="card-body">
            <h5 class="card-title">
                {{ place.name }} 
                {{ place.englishName ? `(${place.englishName})` : '' }}
            </h5>
            <p class="card-text">{{ place.formatted }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: {place: Object},

        setup(props) {
            const place = props.place;
            
            return {
                place,
            }
        }
    }
</script>