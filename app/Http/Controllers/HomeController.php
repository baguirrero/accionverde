<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $dni = '76541526';

        $response = Http::get('https://dniruc.apisperu.com/api/v1/dni/'. $dni, [
            'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImJvZ3VpcnJlQGdtYWlsLmNvbSJ9.oAtXJNjZbJr6In7Lou-8mN4996MRachznGrhc6qCQwc'
        ]);
        $array = $response->json();
        // return $array;
        return view('welcome');
    }
}
