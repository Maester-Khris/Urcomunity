<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['membre_id','message'] ;

    public function membre()
   {
      return $this->belongsTo(Membre::class);
   }
}
