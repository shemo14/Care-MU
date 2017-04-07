<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Payments;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bed;
use App\User;
use App\Care;
use Validator;
use Session;
use Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::where('hospital',Auth::user()->id)->paginate(10);
        return view('admin.patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cares = Care::where('hospital',Auth::user()->id)->get();
        return view('admin.patients.create',compact('cares'));
    }

    public function selectBed(Request $request){
        $inputs = $request->all();
        if($request->ajax()){
            $beds = Bed::where('care',$inputs['care'])->get();
            return response()->json($beds);
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
        $add    = new Patient();
        $rules  = [
            'name'     => 'required',
            'nat_id'   => 'required|unique:patients',
            'bed'      => 'required',
            'care'     => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name'    => 'اسم المريض',
            'bed'    => 'السرير',
            'care'    => 'العناية المركزة',
            'nat_id'  => 'الرقم القومي'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {
            $add->name = $inputs['name'];
            $add->nat_id = $inputs['nat_id'];
            $add->care = $inputs['care'];
            $add->bed = $inputs['bed'];
            $add->hospital = Auth::user()->id;

            if ($add->save()) {
                $bed = Bed::find($add->bed);
                $bed->type = 'full';
                $bed->save();

                Session::put('success', 'تم الاضافة بنجاح');
                return redirect('patients');
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
        $patient = Patient::find($id);
        $care = Care::where('hospital',Auth::user()->id)->lists('name','id');
        $bed  = Bed::where('care',$patient->care)->lists('number','id');
        return view('admin.patients.update',compact('patient','care','bed'));
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
        $add    = Patient::find($id);
        $rules  = [
            'name'     => 'required',
            'nat_id'   => 'required|unique:patients,id',
            'bed'      => 'required',
            'care'     => 'required'
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name'    => 'اسم المريض',
            'bed'    => 'السرير',
            'care'    => 'العناية المركزة',
            'nat_id'  => 'الرقم القومي'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {
            $add->name = $inputs['name'];
            $add->nat_id = $inputs['nat_id'];
            $add->care = $inputs['care'];
            $add->bed = $inputs['bed'];

            if ($add->save()) {
                $bed = Bed::find($add->bed);
                $bed->type = 'full';
                $bed->save();

                Session::put('success', 'تم التعديل بنجاح');
                return redirect('patients');
            } else {
                Session::put('error', 'لم يتم التعديل بعد , الرجاء المحاولة مره اخري');
                return back();
            }
        }
    }

    public function removePatient($id){
        $delete = Patient::where('bed',$id)->delete();
        if ($delete){
            $bed = Bed::find($id);
            $bed->type = 'empty';
            $bed->save();

            Session::put('success', 'تم خروج المريض بنجاح');
            return back();
        } else {
            Session::put('error', 'لم يتم خروج المريض بعد , الرجاء المحاولة مره اخري');
            return back();
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
        //
    }
}
