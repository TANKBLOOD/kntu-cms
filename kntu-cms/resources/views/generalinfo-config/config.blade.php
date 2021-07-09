@extends('custom-layouts.admin-layout')

@section('title', 'GeneralInfo Config')

@section('mainContent')
<div class="py-20">
    <div class="container m-auto w-3/5 border-2 p-24 rounded-lg bg-gray-100" dir="rtl">
        <div>
            <h1 class="text-3xl font-semibold">General Information Config</h1>
        </div>
        <div>
            <form action="{{route('generalInfo.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-6 rounded-md overflow-hidden">
                    <!--Image preview and update place-->
                    <label for="personImage" class="cursor-pointer text-xl font-bold">عکس رزومه<img src="{{asset($gInfo->img_path)}}" alt="" class="mt-3" style="width: 200px; height:200px;"></label>
                    <input type="file" name="personImage" id="personImage" hidden>
                </div>
                <div class="my-10">
                    <label for="fName" class="text-xl block">نام و نام خانوادگی</label>
                    <input type="text" name="fName" id="fName" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->f_name}}">
                </div>
                <div class="my-10">
                    <label for="mainSkill" class="text-xl block">حرفه اصلی</label>
                    <input type="text" name="mainSkill" id="mainSkill" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->main_skill}}">
                </div>
                <div class="my-10">
                    <label for="aboutMe" class="text-xl block">درباره من</label>
                    <textarea name="aboutMe" id="aboutMe" class="w-3/4 h-44 mt-2 text-base rounded-lg">{{$gInfo->about_me}}</textarea>
                </div>
                <div class="my-10">
                    <label for="interests" class="text-xl block">علایق</label>
                    <textarea name="interests" id="interests" class="w-3/4 h-44 mt-2 text-base rounded-lg">{{$gInfo->interests}}</textarea>
                </div>
                <div class="my-10">
                    <label for="birthDate" class="text-xl block">تاریخ تولد</label>
                    <input type="text" name="birthDate" id="birthDate" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->birth_date}}">
                </div>
                <div class="my-10">
                    <label for="phoneNumber" class="text-xl block">شماره تلفن(موبایل)</label>
                    <input type="text" name="phoneNumber" id="phoneNumber" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->phone_number}}">
                </div>
                <div class="my-10">
                    <label for="email" class="text-xl block">آدرس ایمیل</label>
                    <input type="text" name="email" id="email" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->email}}">
                </div>
                <div class="my-10">
                    <label for="address" class="text-xl block">آدرس</label>
                    <input type="text" name="address" id="address" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->address}}">
                </div>
                <div class="my-10">
                    <label for="telegram" class="text-xl block">لینک تلگرام</label>
                    <input type="text" name="telegram" id="telegram" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->telegram}}">
                </div>
                <div class="my-10">
                    <label for="twitter" class="text-xl block">لینک توییتر</label>
                    <input type="text" name="twitter" id="twitter" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->twitter}}">
                </div>
                <div class="my-10">
                    <label for="linkedin" class="text-xl block">لینک لینکدین</label>
                    <input type="text" name="linkedin" id="linkedin" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->linkedin}}">
                </div>
                <div class="my-10">
                    <label for="github" class="text-xl block">لینک گیت هاب</label>
                    <input type="text" name="github" id="github" class="w-3/4 h-10 mt-2 text-base rounded-lg" value="{{$gInfo->github}}">
                </div>
                <div class="mt-12">
                    <input type="submit" value="Save Changes" class="py-1 px-2 rounded-lg bg-blue-500 cursor-pointer hover:shadow-lg text-white text-lg font-semibold">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
