<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialTransaction extends Model
{
    protected $fillable = [
        'conta_id', 'movimento', 'total'
    ];

    public function banks()
    {
        return $this->hasMany(Bank::class);
    }
}
