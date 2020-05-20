<a href=".">Выбрать статью для редактирования</a>
<h1>Редактирование статьи</h1>
<h3>"{{$attraction->title}}"</h3>
<form method="post">
    {{csrf_field()}}
    Название: <input type="text" name="title" value="{{$attraction->title}}"><br><br>
    Описание: <textarea name="description">{{$attraction->description}}</textarea><br><br>
    Город: <select name="city">
        @foreach($cities as $city)
            <option @if($city->id===$attraction->city_id)selected @endif>{{$city->title}}</option>
        @endforeach
    </select>
    <input type="submit" name="submit" value="Сохранить">
</form>