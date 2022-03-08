<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiairecollecte extends Model
{
    use HasFactory;

    protected $fillable = ['membre_id','collectefond_id'] ;

   public function collecte()
   {
      return $this->belongsTo(Collectefond::class);
   }

   public function membre()
   {
      return $this->belongsTo(Membre::class);
   }
}
