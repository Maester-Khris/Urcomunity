<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $appends = ['delegue_num'];
    protected $fillable = ['localisation','identifiant'];

    public function getDelegueNumAttribute(){
      $del = $this->membres->filter(function($value){
         return $value->deleguate == true;
      });
      // dd($del->first()->telephone);
      // gettype($del);
      return $del->first() ;
    }

    public function membres()
    {
        return $this->hasMany(Membre::class);
    }
}
