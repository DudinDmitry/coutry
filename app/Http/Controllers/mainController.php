<?php


namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;

class mainController extends Controller
{
    public function main()
    {
        $countries = Country::all();
                foreach ($countries as $country) {
            echo '<a href="city/' . $country->id . '">' . $country->title . ' (' .
                count($country->city) . ')</a><br>';
        }
    }

    public function city($id)
    {
        $cities = Country::find($id)->city;
        echo '<a href="/">Вернуться к странам</a><br><br>';
        foreach ($cities as $city) {
            echo '<a href="attractions/' . $city->id . '">' . $city->title . ' (' . count($city->attraction) . ')</a><br>';
        }
    }

    public function attraction($id)
    {
        $attractions = City::find($id)->attraction;
        $id_country = City::find($id)->country->id;
        echo '<a href="../' . $id_country . '">Вернуться к городам</a><br><br>';
        foreach ($attractions as $attraction) {
            echo $attraction->title . '<br>
            Описание: '.$attraction->description.'<br><br>
';
        }
    }
}