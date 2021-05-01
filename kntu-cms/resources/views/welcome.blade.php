@extends('custom-layouts.admin-layout')

@section('title', 'Home')

@section('mainContent')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="grid grid-cols-4 text-right" dir="rtl">
        <div class="col-span-1"><!--sidebar-->
            <nav class="pt-8 mr-6 xl:pr-14">
                <h3 class="font-bold text-lg bg-blue-400 rounded-t-md">دستبندی های رزومه</h3>
                <div class="bg-blue-100 mt-1" data-pcat-id="1">
                    <h3 class="font-bold text-lg bg-blue-200">دسته اول</h3>
                    <ul class="mr-4 mt-3 pb-2 font-semibold text-base">
                        <li class="mt-2">first cat</li>
                        <li class="mt-2">second cat</li>
                        <li class="mt-2">third cat</li>
                        <a href="#catModal" rel="modal:open" onclick="getParentId(this)">
                            <button type="button" class="flex justify-end px-3 -mr-1 mt-1 rounded border-2 bg-gray-100">
                                <span class="-mt-1">category</span>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </button>
                        </a>
                    </ul>
                </div>
                <div class="bg-blue-100 mt-3" data-pcat-id="2">
                    <h3 class="font-bold text-lg bg-blue-200">دسته دوم</h3>
                    <ul class="mr-4 mt-3 pb-2 font-semibold text-base">
                        <li class="mt-2">first cat</li>
                        <li class="mt-2">second cat</li>
                        <li class="mt-2">third cat</li>
                        <a href="#catModal" rel="modal:open" onclick="getParentId(this)">
                            <button type="button" class="flex justify-end px-3 -mr-1 mt-1 rounded border-2 bg-gray-100">
                                <span class="-mt-1">category</span>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </button>
                        </a>
                    </ul>
                </div>
                <a href="#pCatModal" rel="modal:open" id="pCatAdder">
                    <button type="button" class="flex items-center px-10 mt-2 rounded border-2 bg-gray-100" title="Add Category">
                        <span class="-mt-1">category</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </button>
                </a>
            </nav>
        </div>
        <div class="col-span-3">
            <div class="mr-10 my-6 p-3"><!--cards go here-->
                <div class="rounded overflow-hidden bg-gray-200 border-b border-gray-300 w-4/5 h-20 mb-6 flex items-center justify-between  shadow">
                    <div class="text-lg font-semibold items-center pr-8"><!--card head-->
                        عنوان برای عنصر رزومه یک
                    </div>
                    <div class="flex ml-16">
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <div>
                            <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="rounded overflow-hidden bg-gray-200 border-b border-gray-300 w-4/5 h-20 mb-6 flex items-center justify-between  shadow">
                    <div class="text-lg font-semibold items-center pr-8"><!--card head-->
                        عنوان برای عنصر رزومه یک
                    </div>
                    <div class="flex ml-16">
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <div>
                            <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </div>
                    </div>
                </div>
                <a href="#cvModal" rel="modal:open">
                    <button class="rounded overflow-hidden bg-white w-4/5 h-20 mb-6 flex items-center justify-center shadow">
                        <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </button>
                </a>
            </div>

            <div id="pCatModal" class="modal">
                <div class="p-5">
                    <h1 class="text-lg font-bold">Add Parent Category</h1>
                    <form id="pCatForm" action="" class="mt-4">
                        <label for="pCategoryName">Parent Category Name:</label>
                        <input type="text" name="pCategory" class="border bg-gray-100" id="pCategoryName">
                        <button type="button" id="addPcatBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">Add Category</button>
                    </form>
                </div>
                <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
            </div>

            <div id="catModal" class="modal">
                <div class="p-5">
                    <h1 class="text-lg font-bold">Add Category</h1>
                    <form id="catForm" action="" class="mt-4">
                        <input type="hidden" id="pCatIdHolder">
                        <label for="categoryName">Category Name:</label>
                        <input type="text" name="category" class="border bg-gray-100" id="categoryName">
                        <button type="button" id="addCatBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">Add Category</button>
                    </form>
                </div>
                <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
            </div>

            <div id="cvModal" class="modal">
                <div class="p-5">
                    <h1 class="text-lg font-bold">Add Cv</h1>
                    <form id="cvForm" action="" class="mt-4">
                        <input type="hidden" id="catIdHolder">
                        <label for="cvName">Cv Title:</label>
                        <input type="text" name="cv" class="border bg-gray-100" id="cvName">
                        <button type="button" id="addCvBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">Add Category</button>
                    </form>
                </div>
                <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
            </div>
        </div>

    <script src="{{asset('js/cv-category/pcategoryajax.js')}}">
    </script>
    <script src="{{asset('js/cv-category/categoryajax.js')}}">
    </script>
@endsection
