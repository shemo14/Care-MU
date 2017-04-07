<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Session;
use App\Files;
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('id','desc')->paginate(10);
        return view('admin.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
        $add    = new Team();
        $rules  = [
            'name'    => 'required',
            'desc'    => 'required',
            'photo'   => 'required|image',
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name'    => 'الاسم',
            'desc'    => 'التفاصيل',
            'photo'   => 'صورة'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {
            $add->name    = $inputs['name'];
            $add->desc    = $inputs['desc'];

            if ($add->save()) {
                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo');
                    FileUploader::Upload($photo,'uploads/team/'. $add->id .'/',$add->id,'team');
                }

                Session::put('success','تم الاضافة بنجاح');
                return redirect('team/'.$add->id);
            }else{
                Session::put('error','تم الاضافة بنجاح');
                return back::to();
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
        $team =  Team::join('files','team.id','=','files.linkedid')
            ->where('files.type','=','team')
            ->where('team.id','=',$id)
            ->select('team.id as n_id','team.name as t_name','path','filename','desc')
            ->first();
        return view('admin.team.show',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team =  Team::join('files','team.id','=','files.linkedid')
            ->where('files.type','=','team')
            ->where('team.id','=',$id)
            ->select('team.id as n_id','team.name as t_name','path','fileName','desc')
            ->first();
        return view('admin.team.update',compact('team'));
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
        $edit   = Team::find($id);
        $rules  = [
            'name'    => 'required',
            'desc'    => 'required',
            'photo'   => 'image',
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'name'    => 'الاسم',
            'desc'    => 'التفاصيل',
            'photo'   => 'صورة',
        ]);

        if ($validate->fails()) {
            Session::put('error','حدث خطأ في التعديل الرجاء حاول مجددا');
            return back()->withInput()->withErrors($validate);
        }else {
            $edit->name    = $inputs['name'];
            $edit->desc    = $inputs['desc'];

            if ($edit->save()) {
                if ($request->hasFile('photo')) {
                    $deletePhoto = Files::where('linkedid','=',$id)->where('type','=','team')->delete();
                    if ($deletePhoto) {
                        $photo = $request->file('photo');
                        FileUploader::Upload($photo,'uploads/team/'. $edit->id .'/',$edit->id,'team');
                    }
                }
                Session::put('success','تم التعديل بنجاح');
                return redirect('team/'.$id);
            }else{
                Session::put('error','لم يتم التعديل بعد الرجاء المحاولة مرة اخري');
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
        $delete = Team::find($id);
        if ($delete->delete()) {
            Files::where('linkedid','=',$id)->where('type','=','team')->delete();
            Session::put('success','تم الحذف بنجاح');
            return redirect('team');

        }else{
            Session::put('error','لم يتم الحذف بعد');
            return back();
        }
    }
}
