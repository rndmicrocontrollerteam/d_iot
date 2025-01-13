<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectHandlesController extends Controller
{
      public function index(){

         return view('Error.404');

      }



}