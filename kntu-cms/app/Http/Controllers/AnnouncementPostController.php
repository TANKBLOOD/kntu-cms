<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementPostController extends Controller
{
    public function create() {
        return view('posting.create');
    }
    public function store(Request $request) {
        $newPost= new AnnouncementPost();
        $newPost->title= $request->postTitle;
        $newPost->content= $request->postContent;

        $request->file('img')->store('public/postsimages');
        $newPost->img_path= 'postsimages/'.$request->file('img')->hashName();

        $request->file('document')->store('public/postsdocs');
        $newPost->attachment= 'postsdocs/'.$request->file('document')->hashName();

        $newPost->link= $request->link;
        $newPost->save();
    }

    public function show(AnnouncementPost $post) {

        return view('posting.show', ['post'=>$post]);
    }

}
