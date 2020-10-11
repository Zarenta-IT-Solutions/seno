<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignGiftToMr extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','gift_id','quantity','is_deliver'];

}
