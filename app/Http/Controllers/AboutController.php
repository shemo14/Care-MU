<?php

namespace App\Http\Controllers;

use Faker\Provider\File;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\About;
use App\Files;
use App\Team;
use Validator;
use Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::find(1);
        $photo = Files::where('linkedid',1)->where('type','=','about')->first();
        return view('admin.about.index',compact('about','photo'));
    }

    public function about(){
        $about = About::find(1);
        $photo = Files::where('type','about')->first();
        $teams = Team::join('files','team.id','=','files.linkedid')
                     ->where('files.type','=','team')
                     ->select('team.name as t_name','desc','path','filename')
                     ->orderBy('team.id','desc')
                     ->take(4)
                     ->get();
        return view('website.about_us',compact('about','photo','teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $about = About::find(1);
        $photo = Files::where('linkedid',1)->where('type','about')->first();
        return view('admin.about.update',compact('about','photo'));
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
        $edit   = About::find(1);
        $rules  = [
            'desc'    => 'required',
            'photo'   => 'image',
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'desc'    => 'التفاصيل',
            'photo'   => 'صورة',
        ]);

        if ($validate->fails()) {
            Session::put('error','حدث خطأ في التعديل الرجاء حاول مجددا');
            return back()->withInput()->withErrors($validate);
        }else {
            $edit->desc    = $inputs['desc'];

            if ($edit->save()) {
                if ($request->hasFile('photo')) {
                    $deletePhoto = Files::where('linkedid','=',1)->where('type','=','about')->delete();
                    if ($deletePhoto) {
                        $photo = $request->file('photo');
                        FileUploader::Upload($photo,'uploads/about/'. 1 .'/',1,'about');
                    }
                }
                Session::put('success','تم التعديل بنجاح');
                return redirect('about');
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
        //
    }
}
