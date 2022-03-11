<template>
  <div>
      
    <div class="container pt-4">
      <HeaderImageComponent :cityName="$route.params.cityname"/>
      <div class="row">
        <CollapsibleCardComponent/>
        <CollapsibleCardComponent/>
      </div>
    </div>
  </div>
</template>

<script>
import HeaderImageComponent from "../components/HeaderImageComponent.vue";
import CollapsibleCardComponent from "../components/CollapsibleCardComponent.vue";
export default {
    name : 'CityDetailsView',
    components : {
      HeaderImageComponent,
      CollapsibleCardComponent,
    },
    data(){
        return {
            cities : []
        };
    },
    methods : {
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

</style>