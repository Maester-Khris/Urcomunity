<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $appends = ['membre_name'];
    protected $fillable = ['titre','qualificatif','description','nombre_vues','statut'] ;

    public function getMembreNameAttribute(){
      return $this->membre->name;
   }
    public function membre()
    {
       return $this->belongsTo(Membre::class);
    }

   public function medias()
   {
      return $this->hasMany(Media::class);
   }
}
