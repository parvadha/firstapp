<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\StudentInsertController;
use App\Http\Controllers\UserController;
use App\Models\Link;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });


// Route::get('hello/{name}', function ($name) {
//     return "hello  ".$name;
// });


// Route::get('page/{id}/{type?}', function ($id,$type=null) {
//     if($id==1 && $type=="page")
//     return "first page";
//     else if ($id==1 && $type=="number")
//     return "first number ";
//     else if($id==1)
//     return "This is first something";
// });

// Route :: get ('emp/{name}/{desig?}', function ($name,$desig = null) {
//     if($name=='mals'&&$desig=="hr")
//     echo $name,$desig;
// else if($name=="devi")
// return $name.$desig;

// });


//Route Name
// Route::get('test-page/{id}/{type?}', function ($id,$type=null) {
//     if($id==1 && $type=="page")
//     return "first page";
//     else if ($id==1 && $type=="number")
//     return "first number ";
//     else if($id==1)
//     return "This is first something";
// })->name("page");

// Route::view('sample-page','home');


//-----------------------------------------
// Route groups and middleware
//----------------------------------------------
// Route::prefix('gallery')->group(function(){
//     Route::get('photos',function(){return '<h3>photos of gallery</h3>';});
//     Route::get('videos',function(){ return '<h3>Videos of page</h3>';});

// });

// Route::get("month/{num}",function($num){
// if($num==1){return "January";}
// else if($num==2){return "Feburary";}
// else if($num==3){return "March";}
// })->middleware('month');
//---------------------------------------------------
// Controller
//------------------------------------------------
//to get route parameters and input parameters from controller
// Route::get('login',[LoginController::class,'login_form']);
// Route::get('month/{num}',[MonthController::class,'getMonth'])->middleware('month');
//----------------------------------------------------------------------
//Blade template engine
//--------------------------------------------------------
// Route::view('layout','layouts.default');
// Route::view('/','homepage');
// Route::view('contact','contact');

//--------------------------------------------------------
// Route::get("day/{num}",function($num){
//     if($num==1){return 'Monday';}
//     elseif($num==2){return 'Tuesday';}
//     elseif($num==3){return 'Wednesday';}
// })->middleware('day');
//-------------------------------------------------------------------
//-------Blade Template Engine--------------------
// Route::view('layout','layouts.default');
// Route::view('/','homepage');
// Route::view('contact','contact');
//----------------------------------------------------
    //DB

// Route::get("/",[StudentInsertController::class,"insert_form"]);
// Route::post("create",[StudentInsertController::class,"insert"]);
// Route::get("view-records",[StudentInsertController::class,"student_list"]);
// Route::get("edit/{id}",[StudentInsertController::class,'edit']);
// Route::post("edit/{id}",[StudentInsertController::class,'update']);
// Route::get('delete/{id}',[StudentInsertController::class,'delete']);

//Eloguant Model
// Route::get("/",[UserController::class,'create']);
// Route::post("/store",[UserController::class,'store']);
// Route::get("list",[UserController::class,"list"]);
// Route::get('edit/{id}',[UserController::class,'edit']);
// Route::post('update/{id}',[UserController::class,'update']);
// Route::get("delete/{id}",[UserController::class,'delete']);

//--------------------------------------------------------
//30--URL Shortner Project
//-----------------------------------------------------
Route::get("/",function(){
    return view('form');
});
Route::post("/",function(Request $request){
    $rules=array('link'=>'required|url');

    $validation=Validator::make($request->all(),$rules);
    if($validation->fails())
    {
        return Redirect::to("/")->withErrors($validation);
    }
    else{
        $link=Link::where('url',$request->input('link'))->first();
        if($link)
        {
            return Redirect::to('/')->with('link',$link->hash);
        }
        else
        {
            do{
                $newHash=Str::random(6);

            }while(Link::where('hash',$newHash)->count()>0);
            Link::create(array(
                'url'=>$request->input('link'),
                'hash'=>$newHash

            ));
            return Redirect::to('/')->with('link',$newHash);

        }
    }

});
Route::get('{hash}',function($hash){
    $link=Link::where('hash',$hash)->first();
    if($link)
    {
        return Redirect::to($link->url);
    }
    else
    {
        return Redirect::to('/')->with('message',"Invalid link");

    }
});



