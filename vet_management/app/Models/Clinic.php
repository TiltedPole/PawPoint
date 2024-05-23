<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'admin_id',
        'phone',
        'email',
    ];

    // public function address()
    // {
    //     return $this->morphOne(Address::class, 'addressable');
    // }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function clients(): HasMany
    {
        return $this->hasMany(User::class, 'client_id');
    }

    // public function appointments()
    // {
    //     return $this->hasMany(Appointment::class);
    // }
}
