<h1>Edit User List</h1>
<form action="/update/{{$user->id}}" method="POST">
    <label for="">Name </label><input type="text" name="name" value={{$user->name}}>
    <br>
    <label for="">Age </label><input type="text" name="age" value={{$user->age}} >
    <br>
    <label for="">Phno </label><input type="text" name="phno" value={{$user->phno}}>
    <br>
    <input type="submit" value="Update User">
    @csrf
</form>
