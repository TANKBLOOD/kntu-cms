<?php

namespace App\Http\Controllers;

use App\Models\CvComponent;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function createComponentAjax(Request $request) {
        $newComponent= new CvComponent();
        $newComponent->cv_id= $request->cvId;
        $newComponent->type= $request->comType;
        $newComponent->title= $request->comTitle;
        $newComponent->value= $request->comValue;

        $newComponent->save();
        return response()->json(['comId'=> $newComponent->id], 200);
    }
    public function updateComponentAjax(Request $request) {
        $component= CvComponent::findOrFail($request->compId);
        $component->value= $request->comValue;
        if(isset($request->comTitle)) {
            $component->title= $request->comTitle;
        }
        $component->save();

        return response()->json(['edited'=> 'true'], 200);
    }
    public function deleteComponentAjax(Request $request) {
        $component= CvComponent::findOrFail($request->compId);
        $component->delete();

        return response()->json(['deleted'=> $request->comId], 200);
    }
}
