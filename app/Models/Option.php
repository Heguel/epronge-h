<?php

namespace App\Models;

use App\Models\Enroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;


    protected $table = 'options';

    protected $fillable = [
        'name',
        'description',

    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }
}
