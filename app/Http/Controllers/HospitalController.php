<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Files;
use Validator;
use Session;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hospitals.create');
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
        $add    = new User();
        $rules  = [
            'name'   => 'required',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:6'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name'    => 'اسم المستشفي',
            'username'    => 'اسم المستخدم',
            'password'    => 'كلمة السر',
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {

            $add->name = $inputs['name'];
            $add->username = $inputs['username'];
            $add->address = $inputs['address'];
            $add->phone = $inputs['phone'];
            $add->pass = $inputs['password'];
            $add->password = bcrypt($inputs['password']);

            if ($request->hasFile('logo')) {
                $logo       = $request->file('logo');
                $namefile   = rand(0000,9999).time();
                $ext        = $logo->getClientOriginalExtension();
                $mastername = $namefile .'.'.$ext;
                $logo->move('uploads/logo/',$mastername);
                $add->filename = $mastername;
                $add->path     = 'uploads/logo/';
            }

            if ($add->save()) {

                Session::put('success', 'تم الاضافة بنجاح');
                return redirect('hospital/' . $add->id);
            } else {
                Session::put('error', 'لم يتم الاضافة بعد , الرجاء المحاولة مره اخري');
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
        $hospital = User::find($id);
        return view('admin.hospitals.show',compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = User::find($id);
        return view('admin.hospitals.update',compact('hospital'));
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
        $add    = User::find($id);
        $rules  = [
            'name'   => 'required',
            'username' => 'required|max:255|unique:users,id',
            'password' => 'required|min:6'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name'    => 'اسم المستشفي',
            'username'    => 'اسم المستخدم',
            'password'    => 'كلمة السر',
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {

            $add->name = $inputs['name'];
            $add->username = $inputs['username'];
            $add->address = $inputs['address'];
            $add->phone = $inputs['phone'];
            $add->password = bcrypt($inputs['password']);
            $add->pass = $inputs['password'];

            if ($request->hasFile('logo')) {
                $logo       = $request->file('logo');
                $namefile   = rand(0000,9999).time();
                $ext        = $logo->getClientOriginalExtension();
                $mastername = $namefile .'.'.$ext;
                $logo->move('uploads/logo/',$mastername);
                $add->filename = $mastername;
                $add->path     = 'uploads/logo/';
            }

            if ($add->save()) {

                Session::put('success', 'تم التعديل بنجاح');
                return redirect('hospital/' . $id);
            } else {
                Session::put('error', 'لم يتم التعديل بعد , الرجاء المحاولة مره اخري');
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
        $delete =  User::find($id)->delete();
        if ($delete){
            Session::put('success', 'تم الحذف بنجاح');
            return redirect('/');
        }else{
            Session::put('error', 'لم يتم الحذف بعد , الرجاء المحاولة مره اخري');
            return back();
        }
    }
}
