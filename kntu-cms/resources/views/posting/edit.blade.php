@extends('custom-layouts.admin-layout')

@section('title', 'Edit Post')

@section('mainContent')
<div>
    <div>
        <form action="{{route('post.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="py-20 bg-gray-300" dir="rtl">
                <div class="w-3/5 m-auto border rounded-md pb-20 bg-gray-200">
                    <div><!--title holder-->
                        <div class="mt-6 mx-12 shadow-md">
                            <img src="{{url('/')}}/storage/{{$post->img_path}}" alt="" class="rounded-t-xl" class="bg-red-50 shadow-md">
                        </div>
                        <div class="flex mx-12 w-full items-center justify-start bg-grey-lighter">
                            <label class="w-64 flex flex-col items-center px-2 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a file</span>
                                <input type='file' name="newImg" class="hidden" />
                            </label>
                        </div>
                    </div>
                    <div><!--content Holder-->
                        <div class="border-2 bg-gray-100 border-gray-300 mx-12 pb-12 border-t-0 -mt-2 shadow-md rounded-b-md">
                            <div class="mt-4 px-4">
                                <div>
                                    <label for="postTitle" class="text-xl font-semibold block">عنوان پست :</label>
                                    <input type="text" name="postTitle" id="postTitle" value="{{$post->title}}" class="w-7/12 mr-2 mt-4">
                                </div>
                                <div class="mt-8 text-xl pr-2">
                                    <label for="postContent" class="block">متن پست: </label>
                                    <textarea class="w-7/12 mt-4 h-72" name="postContent" id="postContent" style="resize: none">{{$post->content}}</textarea>
                                </div>
                                <div class="mt-20 pr-2 flex justify-start items-center">
                                    <h1 class="text-xl ml-4">آپلود مقاله جدید</h1>
                                    <div class="mt-1 text-blue-400">
                                        <div class="flex mx-12 w-full items-center justify-start bg-grey-lighter">
                                            <label class="w-64 flex flex-col items-center px-2 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                                </svg>
                                                <span class="mt-2 text-base leading-normal">Select a file</span>
                                                <input type='file' name="newAttachment" class="hidden" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="pr-2 flex justify-start items-center">
                                        <h1 class="text-xl ml-4">مشاهده مقاله ضمیمه شده</h1>
                                        <div class="mt-1 text-blue-400">
                                            <a target="_blank" href="{{Storage::url($post->attachment)}}">کلیک</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pr-2 flex justify-start items-center">
                                    <h1 class="text-xl ml-4">لینک مربوطه</h1>
                                    <div class="mt-1 text-blue-400 w-6/12">
                                        <input type="text" name="newLink" value="{{$post->link}}" class="w-11/12"  dir="ltr">
                                    </div>
                                </div>
                                <input type="hidden" name="postId" value="{{$post->id}}">
                                <div class="mt-8 mr-2">
                                    <button type="submit" class="font-semibold text-white bg-red-500 px-3 py-1 rounded-md">اعمال تغییرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
