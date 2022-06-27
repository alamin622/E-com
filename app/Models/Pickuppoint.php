<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickuppoint extends Model
{
    use HasFactory;
    protected  $table = 'pickup_points';
    protected $fillable = ['name','address','phone','pickup_status','cash_on_pickup_status'];
}
