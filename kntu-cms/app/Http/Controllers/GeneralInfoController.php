<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use Exception;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{
    public function configPage() {
        $gInfo= GeneralInfo::first();
        return view('generalinfo-config.config', ['gInfo'=> $gInfo]);
    }

    public function update(Request $request) {
        $gInfo= GeneralInfo::first();
        if($request->hasFile('personImage')){
            try{
                unlink(storage_path('app/public/'.$gInfo->img_path));
            }
            catch(Exception $e){

            }
            $request->file('personImage')->store('public/personimage');
            $gInfo->img_path= 'personimage/'.$request->file('personImage')->hashName();
        }
        $gInfo->f_name=  $request->fName;
        $gInfo->main_skill= $request->mainSkill;
        $gInfo->about_me= $request->aboutMe;
        $gInfo->interests= $request->interests;
        $gInfo->birth_date= $request->birthDate;
        $gInfo->phone_number= $request->phoneNumber;
        $gInfo->email= $request->email;
        $gInfo->address= $request->address;
        $gInfo->telegram= $request->telegram;
        $gInfo->twitter= $request->twitter;
        $gInfo->linkedin= $request->linkedin;
        $gInfo->github= $request->github;

        $gInfo->save();

        return view('generalinfo-config.config', ['gInfo'=> $gInfo]);
    }
}
