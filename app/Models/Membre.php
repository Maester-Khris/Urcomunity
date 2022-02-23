<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;

    protected $fillable = ['name','matricule','deleguate','statut','registerd_date',] ;

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
