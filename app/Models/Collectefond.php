<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collectefond extends Model
{
    use HasFactory;

   public function participants()
   {
      return $this->hasMany(Participantcollecte::class);
   }

   public function beneficiaires()
   {
      return $this->hasMany(Beneficiairecollecte::class);
   }
}
