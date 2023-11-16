<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function getMonth($num)
    {
        if($num==1){return "January";}
        else if($num==2){return "Feburary";}
        else if($num==3){return "March";}
    }
}
