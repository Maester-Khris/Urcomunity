<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = ['membre_id','localisation'] ;

    public function membres()
    {
        return $this->hasMany(Membre::class);
    }
}
