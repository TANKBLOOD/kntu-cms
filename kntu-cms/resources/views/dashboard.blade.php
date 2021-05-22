<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-10 py-4" dir="rtl">
                <div class="my-8">
                    <h1 class="text-2xl font-semibold">
                        صفحات در دسترس ادمین
                    </h1>
                    <div class="my-4">
                        <div class="my-1">
                            <a href="/generalInfoConfig" class=" text-lg font-bold text-blue-500 hover:underline">صفحه تنظیم اطلاعات عمومی</a>
                        </div>
                        <div class="my-1">
                            <a href="/cvConfig" class="text-lg font-bold text-blue-500 hover:underline">صفحه تنظیم رزومه</a>
                        </div>
                        <div class="my-1">
                            <a href="/AdminCreatePost" class="text-lg font-bold text-blue-500 hover:underline">صفحه ایجاد پست</a>
                        </div>
                        <div class="my-1">
                            <a href="/adminPosts" class="text-lg font-bold text-blue-500 hover:underline">صفحه لیست پست ها</a>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-semibold">
                        صفحات در دسترس کاربر
                    </h1>
                    <div class="my-4">
                        <div class="my-1">
                            <a href="/cv" class="text-lg font-bold text-blue-500 hover:underline">صفحه اصلی</a>
                        </div>
                        <div class="my-1">
                            <a href="/posts" class="text-lg font-bold text-blue-500 hover:underline">صفحه پست ها</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
