<?php

namespace App\Models;

use Illuminate\Support\Str;
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
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($enroll) {
            $enroll->code = Str::upper(substr($enroll->lastname, 0, 1) . substr($enroll->firstname, 0, 1) . "-". mt_rand(100000, 999999));
        });
    }

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
