<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserFactoryMedicineFavorite;
use Illuminate\Http\Request;

class UserFactoryMedicineFavoriteController extends Controller
{
    //function to get all favorites for user
    public function index()
    {
        $user_id = auth()->user()->id;
        $favorites = UserFactoryMedicineFavorite::where('user_id', $user_id)->get();

        return response()->json([
            'status'=>1,
            'favorites' => $favorites,
        ]);
    }


    //function to store medicine in  favorite  table
    public function store(Request $request)
    {
        $user_id=auth()->user()->id;
    $request->validate([
        'id' => 'required|exists:factory_medicines,id',
    ]);
    $med=UserFactoryMedicineFavorite::query()->where('user_id',$user_id)->where('factoryMedicine_id',$request->id)->first();

    if($med){
        return response()->json([
            'message' => 'Medicine already exists in favorites',
        ]);
    } else {
        UserFactoryMedicineFavorite::query()->create([
            'user_id'=>$user_id,
            'factoryMedicine_id'=>$request->id
        ]);
        return response()->json([
            'message' => 'Medicine added to favorites successfully',
        ]);
    }
}


    //function to delete medicine from  favorite  table
public function destroy(Request $request)
{
    $request->validate([
        'id' => 'required|exists:user_factory_medicine_favorites,id',
    ]);
    $user_id=auth()->user()->id;
    $med=UserFactoryMedicineFavorite::query()->where('user_id',$user_id)->where('id',$request->id)->first();

    if($med){
        UserFactoryMedicineFavorite::query()->where('id',$request->id)->delete();
        return response()->json([
            'message' => 'Medicine removed from favorites successfully',
        ]);
    } else {
        return response()->json([
            'message' => 'Medicine does not exist in favorites',
        ]);
    }
    }
}




