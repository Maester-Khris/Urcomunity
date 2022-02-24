<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = ['titre','qualificatif','description','taux_cautisation','statut'] ;

    public function membre()
    {
       return $this->belongsTo(Membre::class);
    }

   public function medias()
   {
      return $this->hasMany(Media::class);
   }
}
