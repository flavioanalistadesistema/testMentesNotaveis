<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'states';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['users_id', 'state', 'uf'];

   public function user() {
       return $this->belongsTo(StateUser::class, 'state_id');
   }

}
