<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrolls extends Model
{
    use HasFactory;
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
        'date_of_birth',
        'place_of_birth',
        'address',
        'nationality',
        'study_level',
        'last_school_enrolled',
        'type_blood',
        'full_name_person_in_charge',
        'sexe_person_in_charge',
        'telephone_person_in_charge',
        'address_person_in_charge',
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
