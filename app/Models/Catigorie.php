<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catigorie extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    //how has my primare Key

    public function factory_medicine(){
        return $this->hasMany(FactoryMedicine::class);
    }



}
