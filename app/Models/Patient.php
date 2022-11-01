<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'phone', 'dni'];

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
}
