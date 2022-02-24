<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['url_destination'] ;

   public function evenement()
   {
      return $this->belongsTo(Evenement::class);
   }
}
