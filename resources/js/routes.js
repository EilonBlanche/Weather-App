import HomeView from './views/HomeView.vue';
import CityDetailsView from './views/CityDetailsView.vue';
import CityWeatherView from './views/CityWeatherView.vue';

export default{
    mode : 'history',
    routes : [
        {
            path : '/',
            name : 'CityList',
            component : HomeView,
            props: true
        },
        {
            path : '/city/:cityname',
            name : 'CityDetails',
            component : CityDetailsView,
            props: true
        },
        {
            path : '/weather/:cityname',
            name : 'CityWeather',
            component : CityWeatherView,
            props: route => ({ cityid: route.query.id })
        }
    ]
}