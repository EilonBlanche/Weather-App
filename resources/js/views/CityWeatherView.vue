<template>
  <div>
    <div class="mt-3">
      <div class="mx-auto justify-content-center weather-container">
        <h1 class="mb-2">Weather Forecast Summary</h1>
        <img class="card-img-top mb-2 rounded" :src="imageFormat()" alt="Card image cap">
        <div class="row">
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-xs-6 my-3">
            <div class="card">
              <div class="card-body border border-secondary rounded">
                <div class="text-center">
                  <div class="location-box">
                    <img :src="iconFormat(weather.weather[0].icon)" alt="">
                    <div class="h1">{{ weather.name }}</div>
                    <div class="h3 text-uppercase">{{ weather.weather[0].description }}</div>
                  </div>
                  <div class="weather-box">
                    <dl class="row">
                      <dt class="col-sm-6 h5">Temperature :</dt>
                      <dd class="col-sm-6 h6">{{ weather.main.temp }} °C</dd>
                      <dt class="col-sm-6 h5">Date :</dt>
                      <dd class="col-sm-6 h6">{{ convertToLocalDate(weather.dt) }}</dd>
                      <dt class="col-sm-6 h5">Time :</dt>
                      <dd class="col-sm-6 h6">{{ convertToLocalTime(weather.dt) }}</dd>
                      <dt class="col-sm-6 h5">Temp. Range :</dt>
                      <dd class="col-sm-6 h6">{{ weather.main.temp_min }}°C-{{ weather.main.temp_max }} °C</dd>
                      <dt class="col-sm-6 h5">Humidity :</dt>
                      <dd class="col-sm-6 h6">{{ weather.main.humidity }} g.m<sup>-3</sup></dd>
                      <dt class="col-sm-6 h5">Temp. Index :</dt>
                      <dd class="col-sm-6 h6">{{ weather.main.feels_like }} °C</dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-xs-6 my-3">
            <div class="card">
              <div class="card-body border border-secondary rounded">
                <div class="card-title">
                  <h3>Upcoming Weather Forecast</h3>
                </div>
                <table class="table table-responsive">
                  <thead>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Temperature</th>
                    <th colspan="2" class="text-center">Weather</th>
                  </thead>
                  <tbody>
                    <tr v-for="(forecast, index) in weatherForecast.list" :key="index">
                      <td>{{ convertToLocalDate(forecast.dt) }}</td>
                      <td>{{ convertToLocalTime(forecast.dt) }}</td>
                      <td>{{ forecast.main.temp }} °C</td>
                      <td><img :src="iconFormat(forecast.weather[0].icon)" alt=""></td>
                      <td class="text-uppercase">{{ forecast.weather[0].description }}</td>
                    </tr>
                   </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name : 'CityWeatherView',
  data(){
    return {
      weather : {},
      weatherForecast : [],
      icon : ''
    }
  },
  methods : {
    async getWeatherForecast(){
      let myHeaders = new Headers();
      let requestOptions = {
        method: 'GET',
        headers: myHeaders,
      };
      let response = await fetch(`${process.env.MIX_API_BASE_URL}${this.$route.params.cityname}/weather/forecast`, requestOptions);
      let data = await response.json();
      this.weatherForecast = data.data;
    },
    async getWeather(){
      let myHeaders = new Headers();
      let requestOptions = {
        method: 'GET',
        headers: myHeaders,
      };
      let response = await fetch(`${process.env.MIX_API_BASE_URL}${this.$route.params.cityname}/weather`, requestOptions);
      let data = await response.json();
      this.weather = data.data;
    },
    iconFormat(){
      return `http://openweathermap.org/img/wn/${this.weather.weather[0].icon}.png`;
    },
    imageFormat(){
          console.log(`${process.env.MIX_API_BASE_IMAGE}$weathers/${this.weather.weather[0].main}.jpg`)
          return `${process.env.MIX_API_BASE_IMAGE}weathers/${this.weather.weather[0].main}.jpg`;
    },
    convertToLocalDate(dt){
      var newDate = new Date(dt*1000);
      return `${newDate.getMonth()+1}/${newDate.getDate()}/${newDate.getFullYear()}`;
    },
    convertToLocalTime(dt){
      var newDate = new Date(dt*1000);
      return `${newDate.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}`;
    }
  },
  created(){
    this.getWeatherForecast()
    this.getWeather()
    this.iconFormat()
  }
}
</script>

<style scoped>
.weather-container {

    max-width : 1000px;
    width : 100%;
}
</style>