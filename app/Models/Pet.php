<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    protected $table = 'pets';
    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'people_id',
        'image_url',
        'origin',
        'temperament',
    ];

    public function people()
    {
        return $this->belongsTo(People::class, 'people_id');
    }
}
