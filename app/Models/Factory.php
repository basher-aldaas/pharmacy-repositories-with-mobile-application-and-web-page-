<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    // public function factory_medicine_f(){
    //     return $this->hasMany(FactoryMedicine::class);
    // }
public function medicines(){
    return $this->belongsToMany(Medicine::class);
}

}
