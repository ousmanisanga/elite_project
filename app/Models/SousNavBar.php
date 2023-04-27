<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousNavBar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
    ];


    public function navbar() {
        return $this->belongsTo(Navbar::class);



    }
}
