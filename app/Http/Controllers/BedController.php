<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Session;
use App\Bed;
use App\User;
use App\Care;
use Auth;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cares = Care::where('hospital',Auth::user()->id)->get();
        return view('admin.beds.index',compact('cares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = User::where('type',0)->get();
        return view('admin.beds.create',compact('hospitals'));
    }

    public function selectCare(Request $request){
        $inputs = $request->all();
        if($request->ajax()){
            $cares = Care::where('hospital',$inputs['hospital'])->get();
            return response()->json($cares);
        }
    }

    public function editBed($id)
    {
      $edit = Bed::find($id);
      $edit->status = 0;
      if ($edit->save()) {
        Session::put('success','تم التعديل بنجاح');
        return back();
      }else {
        Session::put('error','لم يتم التعديل بعد , الرجاء المحاولة مرة اخري ');
        return back();
      }
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
        $add    = new Bed();
        $rules  = [
            'number'   => 'required',
            'care'     => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'number'    => 'رقم السرير',
            'care'    => 'العناية المركزة'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {
            $add->number = $inputs['number'];
            $add->hospital = Auth::user()->id;
            $add->care = $inputs['care'];
            $add->type = 'empty';

            if ($add->save()) {

                Session::put('success', 'تم الاضافة بنجاح');
                return redirect('beds');
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
        $bed = Bed::find($id);
        $hospitals = User::where('type',0)->lists('name','id');
        $care = Care::where('hospital',$bed->hospital)->lists('name','id');
        return view('admin.beds.update',compact('bed','hospitals','care'));
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
        $add    = Bed::find($id);
        $rules  = [
            'number'   => 'required',
            'care'     => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'number'    => 'رقم السرير',
            'care'    => 'العناية المركزة'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {
            $add->number = $inputs['number'];
            $add->hospital = Auth::user()->id;
            $add->care = $inputs['care'];
//            $add->type = 'empty';

            if ($add->save()) {

                Session::put('success', 'تم الاضافة بنجاح');
                return redirect('beds');
            } else {
                Session::put('error', 'لم يتم الاضافة بعد , الرجاء المحاولة مره اخري');
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
        $delete = Bed::find($id)->delete();
        if ($delete){
            Session::put('success', 'تم الحذف بنجاح');
            return redirect('beds');
        }else{
            Session::put('error', 'لم يتم الحذف بعد , الرجاء المحاولة مره اخري');
            return back();
        }
    }
}
