<?php

namespace App\Http\Controllers\web;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catigorie;
use App\Models\Factory;
use App\Models\Medicine;

class CatigoriesController extends Controller
{

            //function to get name of factory with his catigories
            public function indexCat(Request $request){
                $factory=Factory::query()->where('id',$request['id'])->get();
                $cats=Catigorie::query()->get();
                $data=[];
                $data['factory']=$factory;
                $data['catigories']=$cats;
                return response()->json([
                    'status'=>1,
                    'data'=>$data,
                    'message'=>"success"
                ],200);

            }

            //function to search for catigorie
            public function searchCat(Request $request){
                $catigorie=Catigorie::query()->where('name','=',$request['name'])->first();
                if($catigorie)
                    return response()->json([
                        'status'=>1,
                        'data'=>$catigorie,
                        'message'=>"success"
                    ],200);
                else
                    return response()->json([
                        'status'=>0,
                        'data'=>[],
                        'message'=>"not found"
                    ],404);

     }
}

/* public function home(Request $request){
        $medicines=Medicine::query()->get();
        return view('layout.sidebare',compact('medicines'));

    }

    public function AnalgesicsFunction(Request $request){
        $medicines=Medicine::query()->where('catigorie_id',1)->get();
          return view('layout.sidebare',compact('medicines'));

    }

    public function AntibioticsFunction(){
        $medicines=Medicine::query()->where('catigorie_id',2)->get();
          return view('layout.sidebare',compact('medicines'));
    }
    public function AntidepressantsFunction(){
        $medicines=Medicine::query()->where('catigorie_id',3)->get();
          return view('layout.sidebare',compact('medicines'));
    }

    public function AntihypertensivesFunction(){
        $medicines=Medicine::query()->where('catigorie_id',4)->get();
        return view('layout.sidebare',compact('medicines'));

    }

    public function AntacidsFunction(){
        $medicines=Medicine::query()->where('catigorie_id',5)->get();
          return view('layout.sidebare',compact('medicines'));

    }

    public function AntihistaminesFunction(){
        $medicines=Medicine::query()->where('catigorie_id',6)->get();
        return view('layout.sidebare',compact('medicines'));

    }

    public function searchCat(Request $request){
            $medicines=Medicine::query()->where('catigorie_id','=',$request->query('searC'))->get();
            return view('layout.sidebare',compact('medicines'));


    } */
