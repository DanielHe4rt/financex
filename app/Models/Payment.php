<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $status
 */
class Payment extends Model
{
    use HasUuids;

    protected $table = 'payments';

    protected $fillable = [
        'card_hash',
        'status',
        'value'
    ];

    protected $casts = [
        'value' => 'integer'
    ];

    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }
}
