<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enroll extends Model
{
    use HasFactory;

    protected $table = 'enrolls';

    protected $fillable = [
        'code',
        'lastname',
        'firstname',
        'gender',
        'phone',
        'email',
        'option_id',
        'date_of_birth'
    ];

    /**
     * Get the option that owns the Enroll
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
