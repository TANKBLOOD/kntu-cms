<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function createCvAjax(Request $request) {
        $newCv= new Cv();
        $newCv->title= $request->title;
        $newCv->category_id= $request->catId;
        $newCv->save();

        return response()->json(array('cvId'=> $newCv->id), 200);
    }
    public function getCvsByCategoryAjax(Request $request) {
        $cvs= Cv::where('category_id', $request->catId)->get();

        $resCvs= array();

        foreach($cvs as $cv) {
            array_push($resCvs, array('id'=> $cv->id, 'title'=> $cv->title));
        }
        return response()->json(array('cvs'=> $resCvs), 200);
    }
}
