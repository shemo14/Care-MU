<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Times;
use Session;
use Validator;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Times::orderBy('time','asc')->paginate(10);
        return view('admin.times.index',compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.times.create');
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
        $rules   = [
            'time' => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'time'  => 'التوقيت'
        ]);

        if ($validate->fails()) {
            Session::put('error','الرجاء ادخال البيانات الصحيحة');
            return back()->withInput()->withErrors($validate);
        }else {
            $add = Times::create([
                'time' => $inputs['time'],
                'type' => $inputs['type']
            ]);
            if ($add) {
                Session::put('success', 'تم الاضافة بنجاح');
                return redirect('time');
            } else {
                return back()->with('error', 'لم يتم الاضافة بعد الرجاء المحاولة مره اخري');
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
        $time = Times::find($id);
        return view('admin.times.update',compact('time'));
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
        $edit   = Times::find($id);
        $rules  = [
            'time' => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'time'  => 'التوقيت'
        ]);

        if ($validate->fails()) {
            Session::put('error','الرجاء ادخال البيانات الصحيحة');
            return back()->withInput()->withErrors($validate);
        }else {
            $edit->time = $inputs['time'];
            $edit->type = $inputs['type'];

            if ($edit->save()) {
                Session::put('success', 'تم التعديل بنجاح');
                return redirect('time');
            } else {
                return back()->with('error', 'لم يتم التعديل بعد الرجاء المحاولة مره اخري');
            }
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Times::find($id)->delete();
        if ($delete){
            Session::put('success','تم الحذف بنجاح');
            return back();
        }else{
            Session::put('error','لم يتم الحذف بعد , الرجاء المحاولة مره اخري');
            return back();
        }
    }
}
