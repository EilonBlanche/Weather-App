<template>
  <div class="container">
    <h1>Welcome to the city of {{ cityName }}!</h1>
      <div class="row">
        <img class="card-img-left mx-auto d-block float-left d-inline-block-md my-2" width="100%" height="100%" :src="parseImageUrl()" alt="Card image cap">
        <hr/>
      </div>
  </div> 
</template>

<script>
export default {
    name : 'HeaderImageComponent',
    props : {
        cityName : String
    },
    methods: {
        parseImageUrl : function () {
          return `${process.env.MIX_API_BASE_IMAGE}cities/${this.cityName}.jpg`;
        }
    },
}
</script>

<style scoped>
.img-container{
  height: 1000px; 
  width: 100%; 
  object-fit: cover;
}
</style>