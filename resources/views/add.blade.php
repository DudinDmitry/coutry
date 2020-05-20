<a href="/">На главную</a>
<h1>Добавление достопремечательности</h1>
<form method="post">
    {{csrf_field()}}
    Название: <input type="text" name="title"><br><br>
    Описание: <textarea name="description"></textarea><br><br>
    Город:<select name="city">
@foreach($cities as $city)
    <option>
       {{$city->title}}
    </option>
        @endforeach
    </select><br><br>
    <input type="submit" name="form">
</form>