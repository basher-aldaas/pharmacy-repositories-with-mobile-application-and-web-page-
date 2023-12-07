<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
     protected $fillable=['commercial_name'];
    // protected $guarded=[];

    public function catigorie(){
        return $this->belongsTo(Catigorie::class,'catigorie_id');

    }

    public function factory(){
        return $this->belongsTo(factory::class,'factory_id');

    }

    public function users(){
        return $this->belongsToMany(User::class,'user_medicines','user_id');

    }

    // public function usersFavorite(){
    //     return $this->belongsToMany(User::class,'user_medicine_favorites','user_id');

    // }
}
