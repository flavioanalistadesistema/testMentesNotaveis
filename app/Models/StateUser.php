<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StateUser extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'state_users';


   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['users_id', 'uf'];

   public function state() {
       var_dump('dois');
       return $this->hasOne(States::class, 'state_id');
   }
}
