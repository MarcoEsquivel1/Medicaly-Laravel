<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'speciality_id', 'start_time', 'end_time'];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    //scope name or surname
    public function scopeNameOrSurname($query, $nameOrSurname)
    {
        if ($nameOrSurname) {
            return $query->where('name', 'like', '%' . $nameOrSurname . '%')
                ->orWhere('surname', 'like', '%' . $nameOrSurname . '%');
        }
    }

    //scope speciality name
    public function scopeSpecialityName($query, $specialityName)
    {
        if ($specialityName) {
            return $query->whereHas('speciality', function ($query) use ($specialityName) {
                $query->where('specialityName', 'like', '%' . $specialityName . '%');
            });
        }
    }
}
