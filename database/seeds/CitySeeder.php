<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cities")->insert([
            [
                "id" => "1",
                "city_name" => "Tokyo",
                "city_description" => "Tokyo offers a seemingly unlimited choice of shopping, entertainment, culture and dining to its visitors. The city's history can be appreciated in districts such as Asakusa and in many excellent museums, historic temples and gardens. Contrary to common perception, Tokyo also offers a number of attractive green spaces in the city center and within relatively short train rides at its outskirts.",
                "lat" => "35.67",
                "long" => "139.65"
            ],
            [
                "id" => "2",
                "city_name" => "Yokohama",
                "city_description" => "Yokohama is Japan's second largest city with a population of over three million. Yokohama is located less than half an hour south of Tokyo by train, and is the capital of Kanagawa Prefecture. Towards the end of the Edo Period (1603-1867), during which Japan maintained a policy of self-isolation, Yokohama's port was one of the first to be opened to foreign trade in 1859. Consequently, Yokohama quickly grew from a small fishing village into one of Japan's major cities.",
                "lat" => "35.44",
                "long" => "139.63"
            ],
            [
                "id" => "3",
                "city_name" => "Kyoto",
                "city_description" => "Kyoto served as Japan's capital and the emperor's residence from 794 until 1868. It is one of the country's ten largest cities with a population of 1.5 million people and a modern face. Over the centuries, Kyoto was destroyed by many wars and fires, but due to its exceptional historic value, the city was dropped from the list of target cities for the atomic bomb and escaped destruction during World War II.",
                "lat" => "35.01",
                "long" => "135.76"
            ],
            [
                "id" => "4",
                "city_name" => "Sapporo",
                "city_description" => "Sapporo is the capital of Hokkaido and Japan's fifth largest city. Sapporo is also one of the nation's youngest major cities. In 1857, the city's population stood at just seven people. In the beginning of the Meiji Period, when the development of Hokkaido was started on a large scale, Sapporo was chosen as the island's administrative center and enlarged according to the advice of foreign specialists.",
                "lat" => "43.06",
                "long" => "141.35"
            ],
            [
                "id" => "5",
                "city_name" => "Nagoya",
                "city_description" => "Nagoya is Japan's fourth most populated city. It is the capital of Aichi Prefecture and the principal city of the Nobi plain, one of Honshu's three large plains and metropolitan and industrial centers. Nagoya developed as the castle town of the Owari, one of the three branches of the ruling Tokugawa family during the Edo Period. Much of the city, including most of its historic buildings, were destroyed in the air raids of 1945.",
                "lat" => "35.18",
                "long" => "136.90"
            ]
            ]);
    }
}
