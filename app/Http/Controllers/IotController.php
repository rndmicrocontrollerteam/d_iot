<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IotController extends Controller
{
      public function index(){


         return view('tools.Iot.iotindex');

      }

}