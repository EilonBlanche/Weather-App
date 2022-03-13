<template>
    <div>
        <p class="h1 mt-3">List of Cities</p>
        <div class="row mx-2">
                
            <CardComponent v-for="city in cities" :id="city.id" :key="city.id" :cityName="city.city_name" :lat="city.lat" :long="city.long" :cityDescription="city.city_description">
            </CardComponent>
        </div>
    </div>
</template>

<script>

import CardComponent from "../components/CardComponent.vue";

export default {
    name : 'HomeView',
    components : {
        CardComponent
    },
    data(){
        return {
            cities : []
        };
    },
    methods: {
        getAllCities: async function(){
            let myHeaders = new Headers();
            let requestOptions = {
                method: 'GET',
                headers: myHeaders,
            };
            let response = await fetch(`${process.env.MIX_API_BASE_URL}cities`, requestOptions);
            let data = await response.json();
            this.cities = data.data;
        }
    },
    created(){
        this.getAllCities()
    }
}
</script>

<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>