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
}
