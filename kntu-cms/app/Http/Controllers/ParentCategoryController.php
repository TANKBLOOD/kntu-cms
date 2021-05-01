<?php

namespace App\Http\Controllers;

use App\Models\ParentCategory;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    public function createPcatAjax(Request $request) {

        $newPcat= new ParentCategory();
        $newPcat->name= $request->name;
        $newPcat->save();

        return response()->json(array('pCatId'=> $newPcat->id), 200);
    }
}
