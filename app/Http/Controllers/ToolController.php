<?php

namespace App\Http\Controllers;

use App\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    // get all tools
    public function getAllTools(Request $request)
    {
        $tools = Tool::all();
        return $tools;
    }
    //create a new Tool
    public function createTool(Request $request) {
        Tool::create($request->all());
    }
    //update a Tool
    public function updateTool(Request $request, $id) {

        $tool = Tool::findOrFail($id);
        $tool->name = $request->name;
        $tool->stock = $request->stock;

        $tool->categories = $request->categories;
        
        $tool->save();

        
    }

  
    
    #destroy buzz lightyear
    public function deleteTool($id) {
        Tool::destroy($id);
    }
}