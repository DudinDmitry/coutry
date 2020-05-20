<?php


namespace App\Http\Controllers;

use App\Attraction;
use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function main()
    {
        echo '<a href="/admin">Панель администратора</a><br><br>';
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
            Описание: ' . $attraction->description . '<br><br>
';
        }
    }

    public function admin()
    {
        $echo = '<a href="/admin/add">Добавление </a><br>
<a href="/admin/delete">Удаление</a><br>
<a href="/admin/edit">Редактирование</a>';
        return $echo;
    }

    public function add(Request $request)
    {
        $cities = City::all();
        if ($request->has('form')) {
            if (!$request->has('title')) {
                echo '<p style="color: red">Заполните все поля</p>';
                return view('add', [
                    'cities' => $cities
                ]);
            }
            $city = City::where('title', $request->city)->first();
            $attraction = new Attraction();
            $attraction->title = $request->title;
            $attraction->description = $request->description;

            $city->attraction()->save($attraction);
            echo 'Достопремечательность ' . $request->title . ' успешно добавлена';
        }

        return view('add', [
            'cities' => $cities
        ]);
    }

    public function delete()
    {
        $attraction = Attraction::all();
        echo '<a href=".">В Админку</a><br><br>';
        foreach ($attraction as $item) {
            echo 'ID: ' . $item->id . ' | ' . $item->title . ' | 
            ' . City::find($item->city_id)->title . ' | 
            <a href="/admin/delete/' . $item->id . '">Удалить</a>' . '<br>';
        }
    }

    public function deleteId($id)
    {
        echo 'Достопремечательность ' . Attraction::find($id)->title . ' Удалена<br>';
        Attraction::destroy($id);

        return redirect('/admin/delete');
    }
    public function edit()
    {
        return view('view');
    }
}