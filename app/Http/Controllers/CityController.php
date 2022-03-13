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

    public function getCityPlacesByCategory(Request $request, $city=15000, $category)
    {
        $cityInfo = City::where(['id' => $city])->first()->toArray();
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
        $json_return = [];
        $valid_categories = [10000,13000,16000,18000,19000];
        if(in_array($category,$valid_categories))
        {
            $response = Http::withOptions(['verify' => false])->withHeaders(['Authorization' => env('FSQUARE_API_KEY'),
            'Accept' => 'application/json'])->get(env('FSQUARE_PLACES_API')."ll=$ll&radius=2000&categories=".$category."&fields=categories,location,name,description,tel,email,website,photos&sort=POPULARITY&limit=50");
            foreach (json_decode($response->body(), true)['results'] as $key => $value) {
                $json_return[$key]['category_name'] = $value['categories'][0]['name'];
                $json_return[$key]['address'] = $value['location']['formatted_address'];
                $json_return[$key]['place_name'] = $value['name'];
                $json_return[$key]['contact'] = !empty($value['tel']) ? $value['tel'] : '';
                $json_return[$key]['email'] = !empty($value['email']) ? $value['email'] : '';
                $json_return[$key]['website'] = !empty($value['website']) ? $value['website'] : '';
            }
            return response()->json(['data' => $json_return], 200);
        }
        else
        {
            return response()->json(['data' => 'Invalid Category']);
        }
    }

    public function index(Request $request)
    {
        $response = Http::get(env('OPEN_WEATHER_API').'?q=Manila&appid='.env('OPEN_WEATHER_API_KEY'));
        return response()->json(['data' => $response->body()], 200);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
