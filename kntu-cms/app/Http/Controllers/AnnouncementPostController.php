<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementPostController extends Controller
{
    public function create() {
        return view('posting.create');
    }
}
