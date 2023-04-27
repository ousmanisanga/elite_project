<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Navbar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url'

    ];
    public static function boot()
    {
        parent::boot();
        static::creating(function (Navbar $navbar){
            $navbar->url = '/'. Str::slug($navbar->title);
        });
    }

    public function footer() {
        return $this->belongsTo(footer::class);



    }
}
