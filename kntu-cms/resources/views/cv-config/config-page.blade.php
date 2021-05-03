@extends('custom-layouts.admin-layout')

@section('title', 'CV Config')

@section('mainContent')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="grid grid-cols-4 text-right" dir="rtl">
        <div class="col-span-1"><!--sidebar-->
            <nav class="pt-8 mr-6 xl:pr-14">
                <h3 class="font-bold text-lg bg-blue-400 rounded-t-md">دستبندی های رزومه</h3>
                @foreach ($pCats as $pCat)
                <div class="bg-blue-100 mt-1" data-pcat-id="{{$pCat->id}}">
                    <div class="flex justify-center items-center bg-blue-200">
                        <h3 class="font-bold text-lg">{{$pCat->name}}</h3>
                        <button onclick="deletePcategory(this)" class="mr-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                        <button onclick="editPcategory(this)" class="mr-1">
                            <svg class="w-5 h-5 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                    </div>
                    <ul class="mr-4 mt-3 pb-2 font-semibold text-base">
                        @foreach ($pCat->categories as $category)
                        <div data-cat-id="{{$category->id}}" class="flex items-center">
                            <li class="mt-2 cursor-pointer"  onclick="loadCvs(this)">{{$category->name}}</li>
                            <button onclick="deleteCategory(this)" class="mt-3 mr-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                            <button onclick="editCatAjax(this)" class=" mt-3 mr-1">
                                <svg class="w-5 h-5 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                        </div>
                        @endforeach
                        <a href="#catModal" rel="modal:open" onclick="getParentId(this)">
                            <button type="button" class="flex justify-end px-3 -mr-1 mt-1 rounded border-2 bg-gray-100">
                                <span class="-mt-1">category</span>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </button>
                        </a>
                    </ul>
                </div>
                @endforeach
                <a href="#pCatModal" rel="modal:open" id="pCatAdder">
                    <button type="button" class="flex items-center px-10 mt-2 rounded border-2 bg-gray-100" title="Add Category">
                        <span class="-mt-1">category</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </button>
                </a>
            </nav>
        </div>
        <div class="col-span-3" >
            <!--Every time that user clicks on a cv category the cvs will displayed here-->
            <div class="mr-10 my-6 p-3" id="cvsHolder"><!--cards go here-->
                <div class="rounded overflow-hidden bg-gray-200 border-b border-gray-300 w-4/5 h-52 mb-6 flex items-center justify-center shadow">
                    <div class="text-xl text-gray-600 shadow-sm font-semibold items-center pr-8"><!--card head-->
                        روی دسته بندی ها کلیک کنید تا رزومه ها نمایش داده شوند
                    </div>
                </div>

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

            <div id="editPcatModal" class="modal">
                <div class="p-5">
                    <h1 class="text-lg font-bold">edit Category</h1>
                    <form id="" action="" class="mt-4">
                        <label for="pCatNewName">change Name:</label>
                        <input type="text" name="pCatNewName" class="border bg-gray-100" id="pCatNewName" dir="rtl">
                        <button type="button" id="editPcatBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">save changes</button>
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

            <div id="editCatModal" class="modal">
                <div class="p-5">
                    <h1 class="text-lg font-bold">edit Category</h1>
                    <form id="" action="" class="mt-4">
                        <label for="catNewName">change Name:</label>
                        <input type="text" name="catNewName" class="border bg-gray-100" id="catNewName" dir="rtl">
                        <button type="button" id="editCatBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">save changes</button>
                    </form>
                </div>
                <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
            </div>

            <div id="cvModal" class="modal">
                <div class="p-5">
                    <h1 class="text-lg font-bold">Add Cv</h1>
                    <form id="cvForm" action="" class="mt-4">
                        <label for="cvName">Cv Title:</label>
                        <input type="text" name="cvTitle" class="border bg-gray-100" id="cvName">
                        <button type="button" id="addCvBtn" class="rounded-md border p-1 mt-2 bg-blue-400 text-gray-50">Add Cv</button>
                    </form>
                </div>
                <a href="#" rel="modal:close" class="rounded border p-2 ml-6 bg-red-300 float-right">Close</a>
            </div>

            <div id="cvDeleteConfirmModal" class="modal">
                <div class="p-4">
                    <h3 class="text-gray-600 font-bold text-xl">Are you sure you want to delete the Cv?</h3>
                    <div class="flex justify-end mr-8 mt-2">
                        <button id="delCvBtn" type="button" class="text-white font-bold bg-red-500 rounded-xl border p-2 ml-6">Yes</button>
                        <a href="#" rel="modal:close" class="text-white font-bold bg-blue-500 rounded-xl border p-2 ml-6">No</a>
                    </div>
                </div>
            </div>
            <div id="catDeleteConfirmModal" class="modal">
                <div class="p-4">
                    <h3 class="text-gray-600 font-bold text-xl">Are you sure you want to delete the Category?</h3>
                    <div class="flex justify-end mr-8 mt-2">
                        <button id="delCatBtn" type="button" class="text-white font-bold bg-red-500 rounded-xl border p-2 ml-6">Yes</button>
                        <a href="#" rel="modal:close" class="text-white font-bold bg-blue-500 rounded-xl border p-2 ml-6">No</a>
                    </div>
                </div>
                </div>
            </div>
            <div id="pCatDeleteConfirmModal" class="modal">
                <div class="p-4">
                    <h3 class="text-gray-600 font-bold text-xl">Are you sure you want to delete the Parent Category?</h3>
                    <div class="flex justify-end mr-8 mt-2">
                        <button id="delPcatBtn" type="button" class="text-white font-bold bg-red-500 rounded-xl border p-2 ml-6">Yes</button>
                        <a href="#" rel="modal:close" class="text-white font-bold bg-blue-500 rounded-xl border p-2 ml-6">No</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/cv-category/pcategoryajax.js')}}">
    </script>
    <script src="{{asset('js/cv-category/categoryajax.js')}}">
    </script>
    <script src="{{asset('js/cv/cvajax.js')}}">
    </script>
@endsection
