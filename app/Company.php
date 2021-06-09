<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'city',
        'state',
        'description',
        'address'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function phone()
    {
        return $this->hasMany(Phone::class);
    }

    public function contract()
    {
        return $this->hasMany(Contract::class)
            ->has('company');
    }

    public function getMainPhoneAttribute()
    {
        return $this->phone()
            ->select('number')
            ->where('is_main', 1)
            ->first();
    }
}
