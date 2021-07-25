<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

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
}
