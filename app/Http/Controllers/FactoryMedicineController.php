<?php

namespace App\Http\Controllers;

use App\Models\FactoryMedicine;
use Illuminate\Http\Request;

class FactoryMedicineController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'factory_id'=>'required',
            'catigorie_id'=>'required',
            'medicine_id'=>'required',
            'scientific_name' => 'required|string',
            'commercial_name' => 'required|string',
            'catigorie' => 'required|string',
            'man_company' => 'required|string',
            'amount' => 'required|integer',
            'exp_day' => 'required|date',
            'price' => 'required|integer',
        ]);

        $medicine=FactoryMedicine::query()->create([
            'factory_id' => $request->factory_id,
            'catigorie_id' => $request->catigorie_id,
            'medicine_id' => $request->medicine_id,
            'scientific_name' => $request->scientific_name,
            'commercial_name' => $request->commercial_name,
            'catigorie' => $request->catigorie,
            'man_company' => $request->man_company,
            'amount' => $request->amount,
            'exp_day' => $request->exp_day,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'Medicine added successfully',
            'medicine' => $medicine,
        ]);
    }
}
