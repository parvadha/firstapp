<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentInsertController extends Controller
{
    public function student_list()
    {
        $students=DB::select("select * from student");
        return view("student_list",["students"=>$students]);
    }
    public function insert_form()
    {
        return view('insert_form');
    }
    public function insert(Request $request)
    {
        $name=$request->input("stud_name");

        //insert
        DB::insert("insert into student(name) values(?)",[$name]);
        return 'Record inserted Successfully! <a href="/">Back</a>';
    }
    public function edit($id)
    {
        $student=DB::select("select * from student where id=?",[$id]);
        return view("student_edit",["student"=>$student]) ;
    }
    public function update(Request $request,$id)
    {
        $name=$request->input('stud_name');
        DB::update('update student set name=? where id=?',[$name,$id]);
        return 'Record updated successfully!<a href="/view-records">Click here to go back student list</a>';
    }
    public function delete($id)
    {
        DB::delete('delete from student where id=?',[$id]);
        return 'Record deleted successfully!<a href="/view-records">Click here to see Student Records</a>';
    }
}
