<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoryMedicine extends Model
{
    use HasFactory;
    protected $fillable=[
    'factory_id',
    'catigorie_id',
    'medicine_id',
    'scientific_name',
    'commercial_name',
    'catigorie',
    'man_company',
    'exp_day',
    'price',
    'amount'
];


public function medicine(){
    return $this->belongsTo(Medicine::class);
}

public function factorie(){
    return $this->belongsTo(Factory::class);
}

public function catigorie(){
    return $this->belongsTo(Catigorie::class);
}
public function users(){
    return $this->belongsToMany(User::class);
}

// public function users_v(){
//     return $this->belongsToMany(User::class);
// } 
}
