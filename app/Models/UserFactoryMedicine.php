<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFactoryMedicine extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','order_id','factoryMedicine_id','status','medicineName','quantity'];

    public function user_f_m(){
        return $this->belongsTo(User::class,'user_id');


    }
    public function factory_medicine_f_m(){
        return $this->belongsTo(FactoryMedicine::class,'factoryMedicine_id');


    }

    public function order_f_m(){
        return $this->belongsTo(Order::class,'order_id');

    }




}
