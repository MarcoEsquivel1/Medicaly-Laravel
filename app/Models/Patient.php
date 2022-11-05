<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'name',
        'phone',
        'dni',
        'birthday',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }   

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
