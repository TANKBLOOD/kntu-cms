@extends('custom-layouts.admin-layout')

@section('title', 'Show Post')

@section('mainContent')
<div class="py-32 bg-gray-300" dir="rtl">
    <div class="w-3/5 m-auto border rounded-md pb-20 bg-gray-200">
        <div><!--title holder-->
            <div class="mt-6 mx-12 shadow-md">
                <img src="{{url('/')}}/storage/{{$post->img_path}}" alt="" class="rounded-t-xl" class="bg-red-50 shadow-md">
            </div>
        </div>
        <div><!--content Holder-->
            <div class="border-2 bg-gray-100 border-gray-300 mx-12 pb-12 border-t-0 -mt-2 shadow-md">
                <div class="mt-2 px-4">
                    <div>
                        <h1 class="text-5xl">
                            {{$post->title}}
                        </h1>
                    </div>
                    <div class="mt-8 text-xl pr-2 w-3/4">
                        {{$post->content}}
                    </div>
                    <div class="mt-20 pr-2 flex justify-start items-center">
                        <h1 class="text-xl ml-4">دانلودمقاله ضمیمه شده</h1>
                        <div class="mt-1 text-blue-400">
                            <a target="_blank" href="{{Storage::url($post->attachment)}}">کلیک</a>
                        </div>
                    </div>
                    <div class="mt-4 pr-2 flex justify-start items-center">
                        <h1 class="text-xl ml-4">لینک مربوطه</h1>
                        <div class="mt-1 text-blue-400">
                            <a target="_blank" href="{{$post->link}}">مشاهده</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
