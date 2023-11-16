<html>
<body>

<form action="/edit/{{$student[0]->id}}" method="post">
    {{-- <input type="hidden" name="_token" value="<?=csrf_token()?>"> --}}
    @csrf
Name: <input type="text" name="stud_name" value="{{$student[0]->name}}"><br>
<input type="submit" value="Update_student">
</form>

</body>
</html>

