import HomeView from './views/HomeView.vue';
import CityDetailsView from './views/CityDetailsView.vue';
import CityWeatherView from './views/CityWeatherView.vue';
import CitySpotsView from './views/CitySpotsView.vue';

export default{
    mode : 'history',
    routes : [
        {
            path : '/',
            name : 'CityList',
            component : HomeView
        },
        {
            path : '/city/:cityname',
            name : 'CityDetails',
            component : CityDetailsView
        },
        {
            path : '/weather/:cityname',
            name : 'CityWeather',
            component : CityWeatherView
        }
    ]
}