<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use App\Models\ParentCategory;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    public function index() {
        $pCats= ParentCategory::all();
        $gInfo= GeneralInfo::first();
        return view('cvs.index', ['pCats'=> $pCats, 'gInfo'=> $gInfo]);
    }
    public function createPcatAjax(Request $request) {

        $newPcat= new ParentCategory();
        $newPcat->name= $request->name;
        $newPcat->save();

        return response()->json(array('pCatId'=> $newPcat->id), 200);
    }

    public function deletePcatAjax(Request $request) {
        $pCat= ParentCategory::findOrFail($request->pCatId);
        $pCat->delete();

        return response()->json(array('deleted'=> 'true'), 200);
    }

    public function editPcatAjax(Request $request) {
        $pCat= ParentCategory::findOrFail($request->pCatId);
        $pCat->name= $request->newName;

        $pCat->save();

        return response()->json(array('changed'=> 'true'), 200);
    }
}
