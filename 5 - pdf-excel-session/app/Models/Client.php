<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'username';
    
    public $incrementing = false;
    protected $fillable = ['username','nom','localisation','commentaire','password','bloque'];  
   
    
}
