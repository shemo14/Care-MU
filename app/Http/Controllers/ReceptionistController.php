<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
use Session;
use Auth;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receptionists = User::where('type',2)->paginate(10);
        return view('admin.receptionist.index',compact('receptionists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.receptionist.create');
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
            $add->type = 2;
            $add->hospital = Auth::user()->id;

            if ($add->save()) {

                Session::put('success', 'تم الاضافة بنجاح');
                return redirect('receptionist/');
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
        $receptionist = User::find($id);
        return view('admin.receptionist.update',compact('receptionist'));
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
            $add->type = 2;
            $add->hospital = Auth::user()->id;

            if ($add->save()) {
                Session::put('success', 'تم التعديل بنجاح');
                return redirect('receptionist/');
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
            return redirect('receptionist/');
        }else{
            Session::put('error', 'لم يتم الحذف بعد , الرجاء المحاولة مره اخري');
            return back();
        }
    }
}
