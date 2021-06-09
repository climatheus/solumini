<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $dates = ['expire_date'];

    protected $fillable = [
        'company_owner',
        'company_id',
        'seller_name',
        'expire_date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getIsContractActiveAttribute()
    {
        $contractDate = Carbon::createFromFormat(
            'd/m/Y',
            $this->expire_date->format('d/m/Y')
        );

        $today = Carbon::createFromFormat('d/m/Y', date('d/m/Y'));

        return $contractDate->gt($today) ? 'Não' : 'Sim';
    }
}
