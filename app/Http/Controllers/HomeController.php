<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Team;
use App\News;
use App\About;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams   = Team::join('files','team.id','=','files.linkedid')
                       ->where('files.type','=','team')
                       ->select('team.name as t_name','path','filename','desc')
                       ->get();
        $allNews = News::join('files','news.id','=','files.linkedid')
                       ->where('files.type','=','news')
                       ->select('news.id as n_id','path','filename','desc','title','date')
                       ->get();
        $about   = About::find(1);
        return view('website.index',compact('teams','allNews','about'));
    }

    public function contact(){
        return view('website.contact');
    }
}
