@extends('custom-layouts.admin-layout')

@section('title', 'Cv')

@section('mainContent')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="grid grid-cols-4 text-right" dir="rtl">
    <div class="col-span-1"><!--sidebar-->
        <nav class="pt-8 mr-6 xl:pr-14">
            <div class="bg-blue-100 mt-1">
                <h3 class="font-bold text-lg bg-blue-200">دسته مادر: {{$cv->cat->parentCategory->name}}</h3>
                <ul class="mr-4 mt-3 pb-2 font-semibold text-base">
                    <li class="mt-2 cursor-pointer">دسته: {{$cv->cat->name}}</li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="col-span-3" >
        <!--Every time that user clicks on a cv category the cvs will displayed here-->
        <div class="mr-10 my-6 p-3" id="cvsHolder"><!--cards go here-->
            <div class="rounded overflow-hidden bg-gray-200 border-b border-gray-300 w-4/5 mb-6 shadow">
                <div class="text-xl text-gray-600 font-semibold pr-16 pt-2 my-8 mx-6"><!--card head-->
                    <div class="font-bold text-4xl text-gray-600 pb-4 border-b border-gray-600">
                       <span class="ml-5 text-4xl font-extrabold">رزومه:</span>{{$cv->title}}
                    </div>
                    <hr class="text-red-400">
                    <div class="mt-8 mr-1 w-10/12">
                        <!--components go here-->
                        @foreach ($cv->cvComponent as $component)
                            @if ($component->type == 'sm-option')
                            <div class="flex items-center my-4"><!--sm-option sample-->
                                <svg class="w-6 h-6 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                <div class="ml-5 text-2xl"><!--sm-option title-->
                                    <span> {{$component->title}}:</span>
                                </div>
                                <div class="font-semibold"><!--sm-option value-->
                                    {{$component->value}}
                                </div>
                            </div>
                            @elseif ($component->type == 'option')
                            <div class="my-6 w-10/12"><!--option sample-->
                                <div class="flex items-center"><!--option Title-->
                                    <svg class="w-6 h-6 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                    <div class="text-2xl">
                                        {{$component->title}}
                                    </div>
                                </div>
                                <div class="text-lg pr-2 py-1 border-r-2 border-gray-400" style="margin-right: 0.63rem"><!--option Value-->
                                    {{$component->value}}
                                </div>
                            </div>
                            @elseif ($component->type == 'pure_text')
                            <div class="w-10/12 my-6 relative mr-1"><!--pure_text sample-->
                                <svg class="w-8 h-8 absolute -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                <div class="flex justify-start text-lg pr-1 tracking-wide" style="padding-top: 2px;"><!--Text Content-->
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$component->value}}
                                </div>
                            </div>
                            @else
                            <div class="my-6 flex items-center"><!--link sample-->
                                <svg class="w-6 h-6 mr-1 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                <div class="text-2xl ml-3"><!--link title-->
                                    {{$component->title}}:
                                </div>
                                <div class="text-lg"><!--link value-->
                                    <a href="{{$component->value}}">
                                        بازدید از لینک
                                    </a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
