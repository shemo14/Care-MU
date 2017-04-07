<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Times;
use App\Tables;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use App\Files;
use URL;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Times::orderBy('time','asc')->get();
        $come  = Times::where('type','عودة')->get();
        $go    = Times::where('type','ذهاب')->get();
        $file  = Files::where('linkedid',Auth::user()->id)->first();
        if ($file){
            return view('user.index',compact('times','come','go'));
        }else
            return view('user.tables.create',compact('times','come','go'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $times = Times::orderBy('time','asc')->get();
        $come  = Times::where('type','عودة')->get();
        $go    = Times::where('type','ذهاب')->get();
        return view('user.tables.update',compact('times','come','go'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $user_id = Auth::user()->id;
        $rules = [
            'image' => 'required|image'
        ];

        $validate = Validator::make($inputs, $rules);
        $validate->SetAttributeNames([
            'image' => 'الصورة الشخصية'
        ]);

        if ($validate->fails() && URL::previous() != url('user/create')) {
            Session::put('error', 'الرجاء ادخال البيانات الصحيحة');
            return back()->withInput()->withErrors($validate);
        } else{
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                FileUploader::Upload($photo, 'uploads/users/' . $user_id . '/', $user_id, 'user');
            }
            if($request->has('go_sat') || $request->has('come_sat') || $request->has('go_sun') || $request->has('come_sun') || $request->has('go_mon') || $request->has('come_mon') || $request->has('go_tus') || $request->has('come_tus') || $request->has('go_wen') || $request->has('come_wen') || $request->has('go_ther') || $request->has('come_ther')){
                Tables::where('user_id',$user_id)->delete();
                if ($request->has('go_sat') && $request->has('come_sat')) {
                    Tables::create([
                        'day' => 'السبت',
                        'go' => $inputs['go_sat'],
                        'come' => $inputs['come_sat'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('go_sat')){
                    Tables::create([
                        'day' => 'السبت',
                        'go' => $inputs['go_sat'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('come_sat')){
                    Tables::create([
                        'day' => 'السبت',
                        'come' => $inputs['come_sat'],
                        'user_id' => $user_id
                    ]);
                }

                if ($request->has('go_sun') && $request->has('come_sun')) {
                    Tables::create([
                        'day' => 'الاحد',
                        'go' => $inputs['go_sun'],
                        'come' => $inputs['come_sun'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('go_sun')){
                    Tables::create([
                        'day' => 'الاحد',
                        'go' => $inputs['go_sun'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('come_sun')){
                    Tables::create([
                        'day' => 'الاحد',
                        'come' => $inputs['come_sun'],
                        'user_id' => $user_id
                    ]);
                }

                if ($request->has('go_mon') && $request->has('come_mon')) {
                    Tables::create([
                        'day' => 'الاثنين',
                        'go' => $inputs['go_mon'],
                        'come' => $inputs['come_mon'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('go_mon')){
                    Tables::create([
                        'day' => 'الاثنين',
                        'go' => $inputs['go_mon'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('come_mon')){
                    Tables::create([
                        'day' => 'الاثنين',
                        'come' => $inputs['come_mon'],
                        'user_id' => $user_id
                    ]);
                }

                if ($request->has('go_tus') && $request->has('come_tus')) {
                    Tables::create([
                        'day' => 'الثلاثاء',
                        'go' => $inputs['go_tus'],
                        'come' => $inputs['come_tus'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('go_tus')){
                    Tables::create([
                        'day' => 'الثلاثاء',
                        'go' => $inputs['go_tus'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('come_tus')){
                    Tables::create([
                        'day' => 'الثلاثاء',
                        'come' => $inputs['come_tus'],
                        'user_id' => $user_id
                    ]);
                }

                if ($request->has('go_wen') && $request->has('come_wen')) {
                    Tables::create([
                        'day' => 'الأربعاء',
                        'go' => $inputs['go_wen'],
                        'come' => $inputs['come_wen'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('go_wen')){
                    Tables::create([
                        'day' => 'الأربعاء',
                        'go' => $inputs['go_wen'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('come_wen')){
                    Tables::create([
                        'day' => 'الأربعاء',
                        'come' => $inputs['come_wen'],
                        'user_id' => $user_id
                    ]);
                }

                if ($request->has('go_ther') && $request->has('come_ther')) {
                    Tables::create([
                        'day' => 'الخميس',
                        'go' => $inputs['go_ther'],
                        'come' => $inputs['come_ther'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('go_ther')){
                    Tables::create([
                        'day' => 'الخميس',
                        'go' => $inputs['go_ther'],
                        'user_id' => $user_id
                    ]);
                }elseif ($request->has('come_ther')){
                    Tables::create([
                        'day' => 'الخميس',
                        'come' => $inputs['come_ther'],
                        'user_id' => $user_id
                    ]);
                }
                Session::put('success', 'تم اضافة الجدول بنجاح');
                return redirect('user');
            }else{
                Session::put('error', 'الرجاء ادخال جدول مواعيد التوصيل');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = User::find($id);
        $file  = Files::where('linkedid',$id)->first();
        return view('user.update',compact('data','file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $edit   = User::find($id);
        $file   = Files::where('linkedid',$id);
        $rules   = [
            'name' => 'required',
            'university' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'faculity' => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name' => 'الاسم',
            'university' => 'الجامعة',
            'email' => 'البريد الالكتروني',
            'phone' => 'رقم الهاتف',
            'address' => 'العنوان',
            'faculity' => 'الكلية',
        ]);

        if ($validate->fails()) {
            Session::put('error','الرجاء ادخال البيانات الصحيحة');
            return back()->withInput()->withErrors($validate);
        }else {
            $edit->name = $inputs['name'];
            $edit->email = $inputs['email'];
            $edit->faculity = $inputs['faculity'];
            $edit->address = $inputs['address'];
            $edit->part = $inputs['part'];
            $edit->phone = $inputs['phone'];
            $edit->university = $inputs['university'];

            if ($edit->save()){
                if ($request->hasFile('image')) {
                    $file->delete();
                    $photo = $request->file('image');
                    FileUploader::Upload($photo, 'uploads/users/' . $id . '/', $id, 'user');
                }

                Session::put('success','تم التعديل بنجاح');
                return redirect('user');
            }else{
                Session::put('error','لم يتم التعديل بعد , الرجاء المحاولة مره اخري');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id)->delete();
        if ($delete){
            return redirect('/');
        }else{
            Session::put('error','لم يتم الحذف بعد , الرجاء المحاولة مره اخري');
            return back();
        }
    }
}
