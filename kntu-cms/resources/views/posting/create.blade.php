@extends('custom-layouts.admin-layout')

@section('title', 'Create Post')


@section('mainContent')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="my-32" class="overflow-hidden">
    <div class="m-auto bg-blue-50 w-2/5 rounded-md">
        <div class="m-auto">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="p-14">
                @csrf
                <h2 class="text-3xl font-semibold border-b border-gray-400">New Post information</h2>
                <div class="mt-8 ml-16">
                    <div>
                        <label for="postTitle" class="block font-bold text-lg my-2">Post Title</label>
                        <input type="text" name="postTitle" id="postTitle" class="w-5/6 h-10 mb-2 rounded-md">
                    </div>
                    <div>
                        <label for="postContent" class="block font-bold text-lg my-2">Post Text Content</label>
                        <textarea name="postContent" id="postContent" class="w-5/6 h-52 mb-2 rounded-md">
                        </textarea>
                    </div>
                    <div>
                        <label for="img" class="block font-bold text-lg my-2">Post Image</label>
                        <div class="flex w-full items-center justify-start bg-grey-lighter">
                            <label class="w-64 flex flex-col items-center px-2 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a file</span>
                                <input type='file' name="img" class="hidden" />
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="document" class="block font-bold text-lg my-2">Post Document</label>
                        <div class="flex w-full items-center justify-start bg-grey-lighter">
                            <label class="w-64 flex flex-col items-center px-2 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a file</span>
                                <input type='file' name="document" class="hidden" />
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="link" class="block font-bold text-lg my-2">Post Related Link</label>
                        <input type="text" name="link" id="link" class="w-5/6 h-10 mb-2 rounded-md">
                    </div>
                    <div class="text-center mt-12 m-auto">
                        <input type="submit" value="Add Post" class="bg-green-200 px-16 py-2 rounded-lg text-gray-600">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
