<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
     protected $fillable=['commercial_name'];
    // protected $guarded=[];

    //change for model herer combair with model UserFactoryMedicine
    // public function factory_medicine_m(){
    //     return $this->hasMany(FactoryMedicine::class);
    // }

    public function factories(){
        return $this->belongsToMany(Factory::class);
    }
}
