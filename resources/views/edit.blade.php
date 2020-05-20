<a href=".">Вернуться в админку</a>
<h1>Выберите статью для редактирования</h1>
<table border="1px" >
    <tr>
        <td>ID</td>
        <td>Название</td>
        <td>Город</td>
        <td>Редактировать</td>
    </tr>

    @foreach($attractions as $attraction)
        <tr>
            <td>{{$attraction->id}}</td>
            <td>{{$attraction->title}}</td>
            <td>{{$attraction->city->title}}</td>
            <td align="center"><a href="edit/{{$attraction->id}}">✔️</a> </td>
        </tr>
    @endforeach

</table>