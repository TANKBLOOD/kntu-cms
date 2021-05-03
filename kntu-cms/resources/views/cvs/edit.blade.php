@extends('custom-layouts.admin-layout')

@section('title', 'Edit Cv')

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
        <div class="mr-10 my-6 p-3"><!--cards go here-->
            <div class="rounded overflow-hidden bg-gray-200 border-b border-gray-300 w-4/5 mb-6 shadow">
                <div class="text-xl text-gray-600 font-semibold pr-16 pt-2 my-8 mx-6"><!--card head-->
                    <div class="font-bold text-4xl text-gray-600 pb-4 border-b border-gray-600">
                       <span class="ml-5 text-4xl font-extrabold">رزومه:</span>{{$cv->title}}
                    </div>
                    <hr class="text-red-400">
                    <div class="mt-8 mr-1 w-10/12" id="componentHolder">
                        <!--components go here-->
                        @foreach ($cv->cvComponent as $component)
                            @if ($component->type == 'sm-option')
                            <div class="flex items-center my-4"><!--sm-option sample-->
                                <svg class="w-6 h-6 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                <div class="ml-5 text-2xl"><!--sm-option title-->
                                    <span>{{$component->title}}</span>:
                                </div>
                                <div class="font-semibold"><!--sm-option value-->
                                    {{$component->value}}
                                </div>
                                <div class="mr-8 flex mt-1" data-com-id="{{$component->id}}">
                                    <button onclick="openDeleteModal(this)" class="ml-2 px-2 bg-red-500 rounded-md text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                    <button onclick="openSmOptionEditModal(this)" data-com-id="{{$component->id}}" class="px-2 bg-blue-500 rounded-md text-white">
                                        <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            @elseif ($component->type == 'option')
                            <div class="my-6"><!--option sample-->
                                <div class="flex items-center"><!--option Title-->
                                    <svg class="w-6 h-6 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                    <div class="text-2xl">
                                        {{$component->title}}
                                    </div>
                                    <div class="mr-8 flex mt-1" data-com-id="{{$component->id}}">
                                        <button onclick="openDeleteModal(this)" class="ml-2 px-2 bg-red-500 rounded-md text-white">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                        <button onclick="openOptionEditModal(this)" class="px-2 bg-blue-500 rounded-md text-white">
                                            <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
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
                                <div class="mr-1 flex mt-1" data-com-id="{{$component->id}}">
                                    <button onclick="openDeleteModal(this)" class="ml-2 px-2 bg-red-500 rounded-md text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                    <button onclick="openPureTextEditModal(this)" data-com-id="{{$component->id}}" class="px-2 bg-blue-500 rounded-md text-white">
                                        <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            @else
                            <div class="my-6 flex items-center"><!--link sample-->
                                <svg class="w-6 h-6 mr-1 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                <div class="text-2xl ml-3"><!--link title-->
                                    <span>{{$component->title}}</span>:
                                </div>
                                <div class="text-lg"><!--link value-->
                                    <a href="{{$component->value}}">
                                        بازدید از لینک
                                    </a>
                                </div>
                                <div class="mr-8 flex mt-1" data-com-id="{{$component->id}}">
                                    <button onclick="openDeleteModal(this)" class="ml-2 px-2 bg-red-500 rounded-md text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                    <button onclick="openLinkEditModal(this)" data-com-id="{{$component->id}}" class="px-2 bg-blue-500 rounded-md text-white">
                                        <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="smOptionModal" class="modal">
        <div class="p-5">
            <h1 class="text-lg font-bold">Edit sm-option</h1>
            <form action="" class="mt-4">
                <label for="smOptionTitle">sm-option title:</label>
                <input type="text" name="smOptionTitle" class="border bg-gray-100 w-full text-right" dir="rtl"><br>
                <label for="smOptionValue">sm-option value:</label>
                <input type="text" name="smOptionValue" class="border bg-gray-100 w-full text-right" dir="rtl">
                <button type="button" id="editSmOptionBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">save changes</button>
            </form>
        </div>
        <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
    </div>
    <div id="optionModal" class="modal">
        <div class="p-5">
            <h1 class="text-lg font-bold">Edit option</h1>
            <form action="" class="mt-4">
                <label for="optionTitle">option title:</label>
                <input type="text" name="optionTitle" class="border bg-gray-100 w-full text-right" dir="rtl"><br>
                <label for="optionValue">option value:</label>
                <textarea name="optionValue" class="border bg-gray-100 w-full h-72 text-right" id="optionValue" dir="rtl"></textarea>
                <button type="button" id="editOptionBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">save changes</button>
            </form>
        </div>
        <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
    </div>
    <div id="pureTextModal" class="modal">
        <div class="p-5">
            <h1 class="text-lg font-bold">Edit pure-text modal</h1>
            <form action="" class="mt-4">
                <label for="pureTextValue">pure-text value:</label>
                <textarea name="pureTextValue" class="border bg-gray-100 w-full h-72 text-right" id="pureTextValue" dir="rtl"></textarea>
                <button type="button" id="editPureTextBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">save changes</button>
            </form>
        </div>
        <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
    </div>
    <div id="linkModal" class="modal">
        <div class="p-5">
            <h1 class="text-lg font-bold">Edit link</h1>
            <form action="" class="mt-4">
                <label for="linkTitle">link title:</label>
                <input type="text" name="linkTitle" class="border bg-gray-100 w-full text-right" dir="rtl"><br>
                <label for="linkValue">link url:</label>
                <input type="text" name="linkUrl" class="border bg-gray-100 w-full">
                <button type="button" id="editLinkBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">save changes</button>
            </form>
        </div>
        <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
    </div>
    <div id="componentDeleteConfirmModal" class="modal">
        <div class="p-4">
            <h3 class="text-gray-600 font-bold text-xl">Are you sure you want to delete the component?</h3>
            <div class="flex justify-end mr-8 mt-2">
                <button id="delComponentBtn" type="button" class="text-white font-bold bg-red-500 rounded-xl border p-2 ml-6">Yes</button>
                <a href="#" rel="modal:close" class="text-white font-bold bg-blue-500 rounded-xl border p-2 ml-6">No</a>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/cv/editCvAjax.js')}}">
</script>
@endsection
