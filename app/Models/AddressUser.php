<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'address_users';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['users_id', 'state_id', 'city_id, address_id'];


}
