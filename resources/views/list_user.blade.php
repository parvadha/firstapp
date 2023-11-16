<style>
    table,th,td{
        border: 1px solid black;
        border-collapse:collapse;
    }
</style>
<h3>Users List</h3>
<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Phno</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->age}}</td>
            <td>{{$user->phno}}</td>
            {{-- <td><a href="edit/{{$student->id}}">Edit</a></td> --}}

            <td><a href="{{url('edit/'.$user->id)}}">Edit</a></td>
            <td><a href="{{url('delete/'.$user->id)}}">Delete</a></td>

        </tr>
        @endforeach
    </tbody>
</table>
