<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'CIN';

    public $incrementing = false;

    protected $fillable = ["CIN","Nom","Prenom","DateNaissance","Nationalite","Telephone","Permis"];

    public function getRouteKeyName(){
        return "CIN";
    }

    
}
