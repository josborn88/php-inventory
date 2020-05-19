<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    // get all foods
    public function getAllFood(Request $request)
    {
        $foods = Food::all();
        return $foods;
    }
    //create a new food
    public function createFood(Request $request)
    {
        Food::create($request->all());
    }
    //update a food
    public function updateFood(Request $request, $id)
    {

        $food = Food::findOrFail($id);
        $food->name = $request->name;
        $food->stock = $request->stock;
        $food->unit = $request->unit;
        $food->calories_per_unit = $request->calories_per_unit;
        $food->categories = $request->categories;

        $food->save();
    }



    #destroy buzz lightyear
    public function deleteFood($id)
    {
        Food::destroy($id);
    }
}
