<?php

namespace App\Http\Controllers;

use App\Bed;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Care;

class webService extends Controller
{
    public function hospitals(){
        $hospitals = User::where('type',0)->get();
        header("Content-Type: application/json;charset=utf-8");
        return json_encode(array('allHospital' =>$hospitals ));
    }

    public function showHospital($id){
        $cares = User::join('care','users.id','=','care.hospital')
            ->where('users.id','=',$id)
            ->select('users.name as hospitalName','care.name as careName','care.id as careId')
            ->orderBy('care.id','desc')
            ->get();
        return json_encode(array('showHospital' =>$cares));
    }

    public function hospitalDetails($careID){
        $bedCounter = Bed::where('care',$careID)->where('type','empty')->count();
        return $bedCounter;
    }

    public function showCares($id){
        $beds = Bed::where('care','=',$id)
            ->select('number','type')
            ->orderBy('beds.id','desc')
            ->get();
        return json_encode(array('showCare' => $beds));
    }

    public function allCare(){
        $cares = Care::all();
        return json_encode(array('allCare' => $cares));
    }

    public function allBed(){
        $beds = Bed::all();
        return json_encode(array('allBeds' => $beds));
    }



    public function hospitalsArr(){
        $hospitals = User::where('type',0)->get();
        header("Content-Type: application/json;charset=utf-8");
        $arrhall=array();
        foreach($hospitals as $rows){
            $rows["showHospital"] = $this->showHospitalArr($rows['id']);

            $arrhall['allHospital'][]=$rows;
        }

        return json_encode($arrhall);
    }

    private function showHospitalArr($id){
        $cares = User::join('care','users.id','=','care.hospital')
            ->where('users.id','=',$id)
            ->select('users.name as hospitalName','care.name as careName','care.id as careId')
            ->orderBy('care.id','desc')
            ->get();
        $arrAll=array();
        foreach( $cares as $rows){
            $rows['showCare']=$this->showCarearray($rows['careId']);
            $arrAll[]=$rows;
        }
        return $arrAll;
    }
    public function showCarearray($id){
        $beds = Bed::where('care','=',$id)
            ->select('number','type')
            ->orderBy('beds.id','desc')
            ->get();

        $arrAll=array();
        foreach($beds as $rows){
            if($rows['type']=='empty'){
                $arrAll[]=$rows;
            }
        }
        return $arrAll;
    }



}




