<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Session;
use App\Files;
use App\User;
use App\News;
use App\About;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allNews = News::orderBy('id','desc')->paginate(10);
        return view('admin.news.index',compact('allNews'));
    }

    public function allNews(){
        $allNews = News::join('files','news.id','=','files.linkedid')
                       ->where('files.type','=','news')
                       ->select('news.id as n_id','title','path','filename','date','desc')
                       ->paginate(10);
        $lastNews = News::join('files','news.id','=','files.linkedid')
                        ->where('files.type','=','news')
                        ->select('news.id as n_id','title','desc','path','filename','date')
                        ->orderBy('news.id','desc')
                        ->take(10)
                        ->get();
        $bestNews = News::inRandomOrder()->take(3)->get();
        $related  = News::join('files','news.id','=','files.linkedid')
                        ->where('files.type','=','news')
                        ->select('news.id as n_id','title','desc','path','filename','date')
                        ->orderBy('news.id','desc')
                        ->inRandomOrder()
                        ->take(2)
                        ->get();
        $about    = About::find(1);
        $photo    = Files::where('type','about')->first();
        return view('website.allnews',compact('allNews','lastNews','bestNews','related','about','photo'));
    }

    public function showNews($id){
        $news     = News::join('files','news.id','=','files.linkedid')
                        ->where('news.id',$id)
                        ->where('files.type','=','news')
                        ->select('news.id as n_id','title','desc','path','filename','date')
                        ->first();
        $lastNews = News::join('files','news.id','=','files.linkedid')
                        ->where('files.type','=','news')
                        ->select('news.id as n_id','title','desc','path','filename','date')
                        ->orderBy('news.id','desc')
                        ->take(10)
                        ->get();
        $bestNews = News::inRandomOrder()->take(3)->get();
        $related  = News::join('files','news.id','=','files.linkedid')
                        ->where('files.type','=','news')
                        ->select('news.id as n_id','title','desc','path','filename','date')
                        ->orderBy('news.id','desc')
                        ->inRandomOrder()
                        ->take(2)
                        ->get();
        $about    = About::find(1);
        $photo    = Files::where('type','about')->first();
        return view('website.news',compact('news','lastNews','bestNews','related','about','photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        $add    = new News;
        $rules  = [
            'title'   => 'required|unique:news,title',
            'desc'    => 'required',
            'photo'   => 'required|image',
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'title'   => 'العنوان',
            'desc'    => 'التفاصيل',
            'photo'   => 'صورة'
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else {
            $add->title   = $inputs['title'];
            $add->desc    = $inputs['desc'];
            $add->date    = date("Y-m-d");

            if ($add->save()) {
                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo');
                    FileUploader::Upload($photo,'uploads/news/'. $add->id .'/',$add->id,'news');
                }

                Session::put('success','تم الاضافة بنجاح');
                return redirect('news/'.$add->id);
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
        $news =  News::join('files','news.id','=','files.linkedid')
            ->where('files.type','=','news')
            ->where('news.id','=',$id)
            ->select('news.id as n_id','title','path','filename','desc','date')
            ->first();
        return view('admin.news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news =  News::join('files','news.id','=','files.linkedid')
            ->where('files.type','=','news')
            ->where('news.id','=',$id)
            ->select('news.id as n_id','title','path','fileName','desc')
            ->first();
        return view('admin.news.update',compact('news'));
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
        $edit   = News::find($id);
        $rules  = [
            'title'   => 'required',
            'desc'    => 'required',
            'photo'   => 'image',
        ];

        $validate = Validator::make($inputs,$rules);
        $validate->SetAttributeNames([
            'title'   => 'العنوان',
            'desc'    => 'التفاصيل',
            'photo'   => 'صورة',
        ]);

        if ($validate->fails()) {
            Session::put('error','حدث خطأ في التعديل الرجاء حاول مجددا');
            return back()->withInput()->withErrors($validate);
        }else {
            $edit->title   = $inputs['title'];
            $edit->desc    = $inputs['desc'];

            if ($edit->save()) {
                if ($request->hasFile('photo')) {
                    $deletePhoto = Files::where('linkedid','=',$id)->where('type','=','news')->delete();
                    if ($deletePhoto) {
                        $photo = $request->file('photo');
                        FileUploader::Upload($photo,'uploads/news/'. $edit->id .'/',$edit->id,'news');
                    }
                }
                Session::put('success','تم التعديل بنجاح');
                return redirect('news/'.$id);
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
        $delete = News::find($id);
        if ($delete->delete()) {
            Files::where('linkedid','=',$id)->where('type','=','news')->delete();
            Session::put('success','تم الحذف بنجاح');
            return redirect('news');

        }else{
            Session::put('error','لم يتم الحذف بعد');
            return back();
        }
    }
}
