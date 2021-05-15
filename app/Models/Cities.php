<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'cities';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['user_id', 'state_id', 'city', 'district'];
}
