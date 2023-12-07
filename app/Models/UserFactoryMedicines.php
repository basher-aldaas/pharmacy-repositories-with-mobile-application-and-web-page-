<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMedicines extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','order_id','factoryMedicine_id','status','medicineName','quantity'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
        // return $this->belongsToMany(User::class,'user_id');


    }

    public function medicine(){
        return $this->belongsTo(Medicine::class,'medicine_id');
         // return $this->belongsToMany(Medicine::class,'medicine_id');

    }


}
