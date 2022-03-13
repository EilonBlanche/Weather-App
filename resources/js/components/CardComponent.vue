<template>  
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-3 my-2">   
    <div class="card">
      <img class="card-img-top img-container mx-auto my-auto" :src="parseImageUrl()" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">{{ cityName }}</h2>
          <p class="card-text scrollable">{{ cityDescription }}</p>
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1">
              <router-link class="btn btn-primary text-light form-control" :to="{ name: 'CityWeather', params: { cityname : cityName }}" :id="id"> <span class="fa fa-cloud"></span> Weather Forecast</router-link>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1">
              <router-link class="btn btn-info text-light form-control" :to="{ name: 'CityDetails', params: { cityname : cityName, id : id }}"> <span class="fa fa-search"></span> Explore the City</router-link>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name : 'CardComponent',
  props : {
      id : Number,
      cityName : String,
      cityDescription : String,
      lat : String,
      long : String
  },
  data(){
      return {};
  },
  methods: {
    parseImageUrl : function () {
      return `${process.env.MIX_API_BASE_IMAGE}cities/${this.cityName}.jpg`;
    }
  }
}
</script>

<style scoped>
.scrollable{
  overflow-y: auto; 
  height : 200px;
}

.img-container{
  height: 400px; 
  width: 100%; 
  object-fit: cover;
}
</style>