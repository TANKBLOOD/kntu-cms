<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementPost;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementPostController extends Controller
{
    public function adminIndex() {
        $posts= AnnouncementPost::orderBy('created_at', 'desc')->paginate(5);
        return view('posting.admin-index', ['posts'=> $posts]);
    }
    public function index() {
        $posts= AnnouncementPost::orderBy('created_at', 'desc')->paginate(5);
        return view('posting.index', ['posts'=> $posts]);
    }
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

    public function edit(AnnouncementPost $post) {

        return view('posting.edit', ['post'=> $post]);
    }

    public function update(Request $request) {
        $post= AnnouncementPost::findOrFail($request->postId);
        $post->title= $request->postTitle;
        $post->content= $request->postContent;
        $post->link= $request->newLink;

        if($request->hasFile('newImg')){
            try{
                unlink(storage_path('app/public/'.$post->img_path));
            }
            catch(Exception $e){

            }
            $request->file('newImg')->store('public/postsimages');
            $post->img_path= 'postsimages/'.$request->file('newImg')->hashName();
        }
        if($request->hasFile('newAttachment')){
            try{
                unlink(storage_path('app/public/'.$post->attachment));
            }
            catch(Exception $e){

            }
            $request->file('newAttachment')->store('public/postsdocs');
            $post->attachment= 'postsdocs/'.$request->file('newAttachment')->hashName();
        }
        $post->save();
    }

}
