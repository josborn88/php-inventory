<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
class SpaController extends Controller
{
    public function index()
    {
        return view('spa');
    }

    public function createFood(Request $request) {
        Food::create($request->all());
    }
}
