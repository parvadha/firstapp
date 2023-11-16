<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('create_user');
    }
    public function store(Request $request)
    {
        // $name=$request->input('name');
        // $age=$request->input('age');
        // $phno=$request->input('phno');

        // $user=new User;
        // $user->name=$name;
        // $user->age=$age;
        // $user->phno=$phno;

        // $user->save();

        $data=$request->only(['name','age','phno']);
        $user=User::create($data);


        return'User hasbeen successfully created! user Id is'.$user->id;

    }
    public function list()
    {
        $users=User::all();
        return view("list_user",['users'=>$users]);
    }
    public function edit($id)
    {
        $user=User::find($id);
        return view('edit_user',['user'=>$user]);
    }
    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $user->name=$request->input('name');
        $user->age=$request->input('age');
        $user->phno=$request->input('phno');
        $user->save();
        return 'User updated successfully! <a href=" '.url('list'). ' ">Click here to see the Users List</a>';
    }
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return 'User deleted successfully!<a href="'.url('list').'">List User</a> ';

    }
}
