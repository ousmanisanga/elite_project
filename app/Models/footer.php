<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie'
    ];



    public function sousnavbar() {
        return $this->belongsTo(SousNavBar::class);



    }


}
