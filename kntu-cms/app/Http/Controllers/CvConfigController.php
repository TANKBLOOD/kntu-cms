<?php

namespace App\Http\Controllers;

use App\Models\CvCategory;
use App\Models\ParentCategory;
use Illuminate\Http\Request;

class CvConfigController extends Controller
{
    public function displayCvConfigPage() {
        $cvPcategories= ParentCategory::all();

        return view('cv-config.config-page', ['pCats'=> $cvPcategories]);
    }
}
