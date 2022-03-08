<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;

    protected $appends = ['zone_name'];
    protected $fillable = ['name','matricule','deleguate','statut','registerd_date'] ;

   public function getZoneNameAttribute(){
      return $this->zone->localisation;
   }

   public function zone()
   {
      return $this->belongsTo(Zone::class);
   }

    public function event()
   {
      return $this->hasOne(Evenement::class);
   }

   public function participant()
   {
     return $this->hasOne(Participantcollecte::class);
   }

  public function beneficiaire()
   {
      return $this->hasOne(Beneficiairecollecte::class);
   }

   
}
