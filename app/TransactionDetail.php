<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        /* sesuaikan dengan nama kolom di tabel transaction */
        'transactions_id', 'username', 'nationality', 
        'is_visa', 'doe_passport'
    ];

    protected $hidden = [

    ];

    // Relasi transaction detail dengan transaction
    public function transaction() {
        return $this->belongsTo(
            Transaction::class,
            'transactions_id',
            'id'
        );
    }
}
