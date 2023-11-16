<html>
<body>

<form action="/create" method="post">
    <input type="hidden" name="_token" value="<?=csrf_token()?>">
Name: <input type="text" name="stud_name"><br>
<input type="submit" value="add_student">
</form>

</body>
</html>

