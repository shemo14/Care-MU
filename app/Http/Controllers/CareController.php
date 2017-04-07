<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Care;
use App\Hospital;
use Validator;
use Session;
use Auth;

class CareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cares = Care::join('users','care.hospital','=','users.id')
                     ->where('care.hospital',Auth::user()->id)
                     ->orderBy('care.id','desc')
                     ->select('users.name as h_name','care.name as c_name','care.id as c_id')
                     ->paginate(15);

        return view('admin.care.index',compact('cares'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.care.create');
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
        $add    = new Care();
        $rules  = [
            'name'   => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name'    => 'اسم العناية'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {
            $add->name = $inputs['name'];
            $add->hospital = Auth::user()->id;

            if ($add->save()) {

                Session::put('success', 'تم الاضافة بنجاح');
                return redirect('intensive_care');
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
        $care = Care::find($id);
        return view('admin.care.update',compact('care'));
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
        $add    = Care::find($id);
        $rules  = [
            'name'   => 'required',
            'hospital'    => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name'    => 'اسم العناية',
            'hospital'    => 'المستشفي التابعة'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {
            $add->name = $inputs['name'];
            $add->hospital = $inputs['hospital'];

            if ($add->save()) {

                Session::put('success', 'تم التعديل بنجاح');
                return redirect('intensive_care');
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
        $delete = Care::find($id)->delete();
        if ($delete){
            Session::put('success', 'تم الحذف بنجاح');
            return back();
        } else {
            Session::put('error', 'لم يتم الحذف بعد , الرجاء المحاولة مره اخري');
            return back();
        }
    }
}
