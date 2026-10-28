<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
   $data = [
       'name' => 'Emad Awni',
       'role' => 'Software Engineer'
   ];
   return view ('test',compact('data'));

}
