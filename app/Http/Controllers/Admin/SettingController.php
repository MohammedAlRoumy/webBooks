<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use File;

class SettingController extends Controller
{
    public function getPolicy(){
        $page=[];
        $conf=Settings::all();
        foreach ($conf as $c){
            $page[$c->key]=$c->value;
        }
        return view('admin.policy.index',compact('page'));
    }

    public function postPolicy(Request $request){

        $this->validate($request,[
            'privacy_and_policy'=>['required'],
        ]);
        $keys = $request->except(['_token']);

        foreach ($keys as $key => $value) {
            Settings::set($key, $value);
        }
        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect(route('settings.getPolicy'));
    }


    public function getCopyrights(){
        $page=[];
        $conf=Settings::all();
        foreach ($conf as $c){
            $page[$c->key]=$c->value;
        }
        return view('admin.copyrights.index',compact('page'));
    }

    public function postCopyrights(Request $request){

        $this->validate($request,[
            'copyrights'=>['required'],
        ]);
        $keys = $request->except(['_token']);

        foreach ($keys as $key => $value) {
            Settings::set($key, $value);
        }
        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect(route('settings.getCopyrights'));
    }

    public function getMission(){
        $page=[];
        $conf=Settings::all();
        foreach ($conf as $c){
            $page[$c->key]=$c->value;
        }
        return view('admin.our_mission.index',compact('page'));
    }

    public function postMission(Request $request){

        $this->validate($request,[
            'mission'=>['required'],
        ]);
        $keys = $request->except(['_token']);

        foreach ($keys as $key => $value) {
            Settings::set($key, $value);
        }
        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect(route('settings.getMission'));
    }
    public function getPublish(){
        $page=[];
        $conf=Settings::all();
        foreach ($conf as $c){
            $page[$c->key]=$c->value;
        }
        return view('admin.publish.index',compact('page'));
    }

    public function postPublish(Request $request){

        $this->validate($request,[
            'publish'=>['required'],
        ]);
        $keys = $request->except(['_token']);

        foreach ($keys as $key => $value) {
            Settings::set($key, $value);
        }
        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect(route('settings.getPublish'));
    }


    public function getSettings(){
        $page=[];
        $conf=Settings::all();
        foreach ($conf as $c){
            $page[$c->key]=$c->value;
        }
        return view('admin.settings.index',compact('page'));
    }

    public function postSettings(Request $request){

      /*  $this->validate($request,[
            'publish'=>['required'],
        ]);*/
        if ($request->has('site_logo') && ($request->file('site_logo'))) {

            if (config('settings.site_logo') != null) {
                File::delete(public_path('uploads/settings/' . config('settings.site_logo')));
            }

            $logo = $request->file('site_logo');
            // return $logo;
            $extention = $logo->getClientOriginalExtension();
            $file_name = 'settings_' . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;

            $logo->move('uploads/settings/', $file_name);

            Settings::set('site_logo', $file_name);

        }
        if ($request->has('site_favicon') && ($request->file('site_favicon'))) {

            if (config('settings.site_favicon') != null) {
                // $this->deleteOne(config('settings.site_favicon'));
                File::delete(public_path('uploads/settings/' . config('settings.site_favicon')));
            }

            $favicon = $request->file('site_favicon');
            $extention = $favicon->getClientOriginalExtension();
            $file_name = 'settings_' . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;

            $favicon->move('uploads/settings/', $file_name);

            Settings::set('site_favicon', $file_name);


        }


        $keys = $request->except(['_token','site_favicon','site_logo','حذف_الشعار','حذف_الايقونة']);

        // return $request;

        foreach ($keys as $key => $value) {
            Settings::set($key, $value);
        }
        session()->flash('success', 'تمت عملية التعديل بنجاح');
        return redirect(route('settings.getSettings'));
    }
}
