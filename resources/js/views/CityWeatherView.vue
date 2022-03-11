<template>
  <div>
      <WeatherComponent/>
      <!-- City Weather of {{ $route.params.cityname }} -->
  </div>
</template>

<script>
import WeatherComponent from '../components/WeatherComponent.vue'
export default {
  components: { WeatherComponent },
    name : 'CityWeatherView'
}
</script>

<style>
</style>