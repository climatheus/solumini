<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'number',
        'is_main'
    ];

    protected $table = 'company_phones';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
