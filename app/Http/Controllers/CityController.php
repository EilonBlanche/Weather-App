<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAllCities()
    {
        $cities = City::all()->toArray();
        return response()->json(['data' => $cities], 200);
    }

    public function getCityPlacesByCategory(Request $request, $cityid, $category)
    {
        $cityInfo = City::where(['id' => $cityid])->first()->toArray();
        $ll = implode(',', [$cityInfo['lat'], $cityInfo['long']]);
        $meters = 0;
        if($cityInfo['city_name'] == "Tokyo")
        {
            $meters = 23000;
        }
        if($cityInfo['city_name'] == "Yokohama")
        {
            $meters = 10450;
        }
        if($cityInfo['city_name'] == "Kyoto")
        {
            $meters = 14350;
        }
        if($cityInfo['city_name'] == "Sapporo")
        {
            $meters = 16700;
        }        
        if($cityInfo['city_name'] == "Nagoya")
        {
            $meters = 9000;
        }
        $jsonReturn = [];
        $validCategories = [10000,13000,15000,16000,18000,19000];
        if(in_array($category,$validCategories))
        {
            $response = Http::withOptions(
                ['verify' => false]
            )->withHeaders(
                [
                    'Authorization' => env('FSQUARE_API_KEY'),
                    'Accept' => 'application/json']
            )->get(
                env('MIX_FSQUARE_PLACES_API').
                "ll=$ll&radius=2000&categories=".$category.
                "&fields=categories,location,name,description,tel,email,website,photos&sort=POPULARITY&limit=50"
            );
            foreach (json_decode($response->body(), true)['results'] as $key => $value) {
                $jsonReturn[$key]['category_name'] = $value['categories'][0]['name'];
                $jsonReturn[$key]['address'] = $value['location']['formatted_address'];
                $jsonReturn[$key]['place_name'] = $value['name'];
                $jsonReturn[$key]['contact'] = !empty($value['tel']) ? $value['tel'] : '';
                $jsonReturn[$key]['email'] = !empty($value['email']) ? $value['email'] : '';
                $jsonReturn[$key]['website'] = !empty($value['website']) ? '<a href="'.$value['website'].'" target="_blank">Link to website</a>' : '';
            }
            return response()->json(['data' => $jsonReturn], 200);
        }
        else
        {
            return response()->json(['data' => 'Invalid Category']);
        }
    }

    public function getCityWeatherForecast(Request $request, $city, $forecast="")
    {
        if($forecast !== "forecast")
        {
            $response = Http::get(env('MIX_OPEN_WEATHER_API')."q=$city&appid=".env('MIX_OPEN_WEATHER_API_KEY')."&units=metric");
        }
        else
        {        
            $response = Http::get(env('MIX_OPEN_WEATHER_FORECAST_API')."q=$city&appid=".env('MIX_OPEN_WEATHER_API_KEY')."&cnt=5&units=metric");
        }
        return response()->json(['data' => json_decode($response->body(), true)], 200);
    }
}
