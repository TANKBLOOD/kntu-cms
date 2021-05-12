@extends('custom-layouts.admin-layout')

@section('title', 'GeneralInfo Config')

@section('mainContent')
<div>
    <div class="container">
        <div>

        </div>
        <div>
            <form action="">
                <div>
                    <label for="fName">Full name</label>
                    <input type="text" name="fName" id="fName">
                </div>
                <div>
                    <label for="mainSkill">Main Skill</label>
                    <input type="text" name="mainSkill" id="mainSkill">
                </div>
                <div>
                    <label for="about_me">About me</label>
                    <textarea name="about_me" id="about_me"></textarea>
                </div>
                <div>
                    <label for="interests">Interests</label>
                    <textarea name="interests" id="interests"></textarea>
                </div>
                <div>
                    <label for="birth_date">Birth Date</label>
                    <input type="text" name="birth_date" id="birth_date">
                </div>
                <div>
                    <label for="phone_number">Phone number</label>
                    <input type="text" name="phone_number" id="phone_number">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div>
                    <label for="address">Adress</label>
                    <input type="text" name="address" id="address">
                </div>
                <div>
                    <label for="face_book">Face Book Link</label>
                    <input type="text" name="face_book" id="face_book">
                </div>
                <div>
                    <label for="telegram">Telgeram Link</label>
                    <input type="text" name="telegram" id="telegram">
                </div>
                <div>
                    <label for="twitter">Twitter Link</label>
                    <input type="text" name="twitter" id="twitter">
                </div>
                <div>
                    <label for="linkedin">Linkedin Link</label>
                    <input type="text" name="linkedin" id="linkedin">
                </div>
                <div>
                    <label for="github">Github Link</label>
                    <input type="text" name="github" id="github">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
