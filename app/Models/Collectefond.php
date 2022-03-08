<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collectefond extends Model
{
    use HasFactory;

   protected $appends = ['event_titre'];
   protected $fillable = ['evenement_id','date_lancement','delai_envoi_participation','montant_cotisation','statut'];

   public function getEventTitreAttribute(){
      return $this->evenement->titre;
   }

   public function evenement(){
      return $this->belongsTo(Evenement::class);
   }

   public function participants()
   {
      return $this->hasMany(Participantcollecte::class);
   }

   public function beneficiaires()
   {
      return $this->hasMany(Beneficiairecollecte::class);
   }
}
