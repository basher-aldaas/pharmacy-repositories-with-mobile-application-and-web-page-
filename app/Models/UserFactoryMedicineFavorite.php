<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFactoryMedicineFavorite extends Model
{
    use HasFactory;
    protected $fillable=['user_id','factoryMedicine_id'];

    // public function user(){
    //     return $this->belongsTo(User::class);

    // }

    // public function factory_medicine_v(){
    //     return $this->belongsTo(FactoryMedicine::class);

    // }
}
