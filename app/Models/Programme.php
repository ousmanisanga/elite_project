<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;



    protected $fillable = [
        'jour',
        'horaires',
        'libelle',
        'user_name'
    ];



    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = $model->generateNewId();
        });
    }

    public function generateNewId()
    {
        $month = date('m',);
        $week = date_format(date_create(), 'W',);

        return $month . $week;
    }


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
