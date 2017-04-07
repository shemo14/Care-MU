<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cities;
use Validator;
use Auth;
use Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Cities::paginate(10);
        return view('admin.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
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
            'city' => 'required',
            'cost' => 'required',
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'city'  => 'اسم المدينة',
            'cost'  => 'التكلفة الشهرية',
        ]);

        if ($validate->fails()) {
            Session::put('error','الرجاء ادخال البيانات الصحيحة');
            return back()->withInput()->withErrors($validate);
        }else {
            $add = Cities::create([
                'city' => $inputs['city'],
                'cost' => $inputs['cost'],
            ]);
            if ($add) {
                Session::put('success', 'تم الاضافة بنجاح');
                return redirect('city');
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
        $city = Cities::find($id);
        return view('admin.cities.update',compact('city'));
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
        $edit   = Cities::find($id);
        $rules  = [
            'cost' => 'required',
            'city' => 'required',
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'city'  => 'اسم المدينة',
            'cost'  => 'التكلفة الشهرية',
        ]);

        if ($validate->fails()) {
            Session::put('error','الرجاء ادخال البيانات الصحيحة');
            return back()->withInput()->withErrors($validate);
        }else {
            $edit->city = $inputs['city'];
            $edit->cost = $inputs['cost'];

            if ($edit->save()) {
                Session::put('success', 'تم التعديل بنجاح');
                return redirect('city');
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
        $delete = Cities::find($id)->delete();
        if ($delete){
            Session::put('success','تم الحذف بنجاح');
            return back();
        }else{
            Session::put('error','لم يتم الحذف بعد , الرجاء المحاولة مره اخري');
            return back();
        }
    }
}
