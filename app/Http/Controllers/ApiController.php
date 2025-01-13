<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function login(){
        $data = User::all();
        $UsernamePass = [];
        foreach($data as $perdata){
            $UsernamePass = [$perdata->name,$perdata->user_roles_id];
        }

        return response()->json([
            "data" => $UsernamePass,
        ]);

    }

}
