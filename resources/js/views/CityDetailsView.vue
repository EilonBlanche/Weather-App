<template>
  <div>
      
    <div class="container pt-4">
      
      <HeaderImageComponent :cityName="$route.params.cityname"/>
      <div class="row">
        <div class="col-md-12">
          <select class="custom-select" @change="handleChange">
              <option value="">Choose Type of Place ...</option>
              <option value="10000">Arts and Entertainment</option>
              <option value="13000">Dining and Drinking</option>
              <option value="15000">Health and Medicine</option>
              <option value="16000">Landmarks and Outdoors</option>
              <option value="18000">Sports and Recreation</option>
              <option value="19000">Travel and Transportation</option>
          </select>
        </div>
      </div>
      {{ id }}
      <div class="row" v-if="placeType !== ''">
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
    props : {
      id : Number
    },
    components : {
      HeaderImageComponent,
      CollapsibleCardComponent,
    },
    data(){
        return {
          placeType : '',
          places : []
        };
    },
    methods : {
    async handleChange(e){
        this.placeType = e.target.value;
        if(e.target.value !== ""){
            let myHeaders = new Headers();
            let requestOptions = {
                method: 'GET',
                headers: myHeaders,
            };
            let response = await fetch(`${process.env.MIX_API_BASE_URL}${this.id}/places/${e.target.value}`, requestOptions);
            let data = await response.json();
            this.places = data.data;
        }
      }
    }
}
</script>

<style>

</style>