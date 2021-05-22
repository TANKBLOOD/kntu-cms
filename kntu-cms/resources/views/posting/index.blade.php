@extends('custom-layouts.user-side.user-layout')

@section('title', 'Posts')

@section('mainContent')
<div class="bg-gray-100 w-10/12 m-auto mt-28" style="font-family: Shabnam;">
    <div class="pb-32" dir="rtl">
        <div class="">
            <h1 class="lg:w-9/12 mr-5 pr-1 font-bold text-4xl border-b-4 pb-3">
                صفحه اطلاعیه
            </h1>
        </div>
        <div class="mt-12 mx-5 lg:w-9/12">
            @foreach ($posts as $post)
            <div class="relative my-10 lg:flex justify-start border-gray-400 rounded-lg overflow-hidden bg-white shadow-sm hover:shadow-2xl">
                <div class="w-full lg:w-80 lg:border-l-4 border-black flex-shrink-0">
                    <img src="{{url('/')}}/storage/{{$post->img_path}}" alt="" class="h-60 w-full lg:w-80 border-0">
                </div>
                <div class="p-4 lg:p-7 lg:pr-10">
                    <div class="text-3xl font-semibold hover:underline">
                        <a href="/showPost/{{$post->id}}">
                            <h3>
                                {{$post->title}}
                            </h3>
                        </a>

                    </div>
                    <div class="pt-4 mb-1 leading-7 font-medium">
                        {{ substr($post->content, 0, 350) }}  ....
                    </div>
                    <div class="float-left absolute bottom-0 left-6 lg:bottom-4 font-semibold">
                        <small dir="ltr">{{$post->created_at}}</small>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="container mr-6 flex justify-end" dir="ltr">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection

