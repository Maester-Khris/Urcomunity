<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiairecollecte extends Model
{
    use HasFactory;

   public function collecte()
   {
      return $this->belongsTo(Collectefond::class);
   }
}
