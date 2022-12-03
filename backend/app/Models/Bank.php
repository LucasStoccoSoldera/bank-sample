<?php

namespace App\Models;

use App\FinancialTransaction;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Bank extends Model
{
    protected $fillable = [
        'conta', 'total'
    ];

    public function financialTransactions(){
        return $this->belongsTo(FinancialTransaction::class);
    }

}
