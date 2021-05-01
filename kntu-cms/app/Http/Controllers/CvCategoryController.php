<?php

namespace App\Http\Controllers;

use App\Models\CvCategory;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class CvCategoryController extends Controller
{
    public function createCatAjax(Request $request) {

        $newPcat= new CvCategory();
        $newPcat->parent_id= $request->parentId;
        $newPcat->name= $request->name;
        $newPcat->save();

        return response()->json(array('catId'=> $newPcat->id), 200);
    }
}
