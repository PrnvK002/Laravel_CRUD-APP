<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function index(){
        $data = [
            'name' => 'John Doe',
            'age' => 30,
            'city' => 'New York'
        ];
        echo "request reaching here------------- $data";
        return response()->json($data);
    }
}
