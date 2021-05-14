@extends('custom-layouts.user-side.user-layout')

@section('title', 'Posts')

@section('mainContent')
<div class="container m-auto mt-28">
    <div class="pb-32" dir="rtl">
        <div>
            <h1 class="pr-1 font-bold text-4xl border-b-4 pb-3">
                صفحه اطلاعیه
            </h1>
        </div>
        <div class="mt-12 w-9/12">
            @foreach ($posts as $post)
            <div class="relative my-4 flex justify-start border-2 border-gray-400 rounded-2xl overflow-hidden bg-white shadow-lg hover:shadow-2xl">
                <div class="w-64 border-l-4 border-black flex-shrink-0">
                    <img src="{{url('/')}}/storage/{{$post->img_path}}" alt="" class="h-52 w-64 border-0">
                </div>
                <div class="p-7 pr-10">
                    <div class="text-3xl font-semibold hover:underline">
                        <a href="/showPost/{{$post->id}}">
                            <h3>
                                {{$post->title}}
                            </h3>
                        </a>

                    </div>
                    <div class="pt-4 leading-7 font-medium">
                        {{ substr($post->content, 0, 350) }}  ....
                    </div>
                    <div class="float-left absolute bottom-4 font-semibold">
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

