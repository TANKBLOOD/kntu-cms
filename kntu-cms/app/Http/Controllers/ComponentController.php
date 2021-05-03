<?php

namespace App\Http\Controllers;

use App\Models\CvComponent;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function updateComponentAjax(Request $request) {
        $component= CvComponent::findOrFail($request->compId);
        $component->value= $request->comValue;
        if(isset($request->comTitle)) {
            $component->title= $request->comTitle;
        }
        $component->save();

        return response()->json(['edited'=> 'true'], 200);
    }
}
