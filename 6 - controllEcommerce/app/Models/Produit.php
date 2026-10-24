<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produit extends Model
{
    protected $fillable=["name","description","image","quantite","price","categorie_id"];
    use HasFactory;
    function categorie():BelongsTo{
        return $this->belongsTo(Categorie::class);
    }
}
