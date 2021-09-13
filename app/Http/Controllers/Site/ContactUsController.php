<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{

   /* public function contactusValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ],
            [
                'name.required' => 'الاسم  مطلوب',
                'title.required' => 'عنوان الرسالة مطلوب',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
                'message.required' => 'الرسالة مطلوبة'
            ]);
    }*/

    public function contactusAdd(Request $request)
    {

        //return $request;
        //$validator = $this->contactusValidator($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ],
            [
                'name.required' => 'الاسم  مطلوب',
                'title.required' => 'عنوان الرسالة مطلوب',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
                'message.required' => 'الرسالة مطلوبة'
            ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $contactus = ContactUs::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'title' => $request['title'],
            'message' => $request['message'],
        ]);

       // return response()->json();

       //session()->flash('success', "تم ارسال الرسالة بنجاح، شكراً لتواصلك معنا");
      //  return redirect()->route('site.index')->with('success', "تم ارسال الرسالة بنجاح، شكراً لتواصلك معنا");;
        if ($contactus){
            return response()->json(['status' => 'success', 'message' => 'تم ارسال الرسالة بنجاح، شكراً لتواصلك معنا']);

        }else{
            return response()->json(['status' => 'error', 'message' => 'حدث خطأ ما']);

        }

    }
}
