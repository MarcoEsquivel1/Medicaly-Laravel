<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'time', 'doctor_id', 'patient_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function scopeDate($query, $date)
    {
        if ($date) {
            return $query->where('date', $date);
        }
    }

    public function scopeDoctor($query, $doctor)
    {
        if ($doctor) {
            return $query->where('doctor_id', $doctor);
        }
    }

    public function scopePatient($query, $patient)
    {
        if ($patient) {
            return $query->where('patient_id', $patient);
        }
    }

    public function scopeDateFrom($query, $dateFrom)
    {
        if ($dateFrom) {
            return $query->where('date', '>=', $dateFrom);
        }
    }

    public function scopeDateTo($query, $dateTo)
    {
        if ($dateTo) {
            return $query->where('date', '<=', $dateTo);
        }
    }

    //scope date from to
    public function scopeDateFromTo($query, $dateFrom, $dateTo)
    {
        if ($dateFrom && $dateTo) {
            return $query->whereBetween('date', [$dateFrom, $dateTo]);
        }
    }

    //scope doctor name or surname
    public function scopeDoctorNameOrSurname($query, $doctorName, $doctorSurname)
    {
        if ($doctorName && $doctorSurname) {
            return $query->whereHas('doctor', function ($query) use ($doctorName, $doctorSurname) {
                $query->where('name', 'like', '%' . $doctorName . '%')
                    ->orWhere('surname', 'like', '%' . $doctorSurname . '%');
            });
        }
    }

    public function scopePatientNameOrSurname($query, $patientName, $patientSurname)
    {
        if ($patientName && $patientSurname) {
            return $query->whereHas('patient', function ($query) use ($patientName, $patientSurname) {
                $query->where('name', 'like', '%' . $patientName . '%')
                    ->orWhere('surname', 'like', '%' . $patientSurname . '%');
            });
        }
    }

    public function scopeSpeciality($query, $speciality)
    {
        if ($speciality) {
            return $query->whereHas('doctor', function ($query) use ($speciality) {
                $query->where('speciality_id', $speciality);
            });
        }
    }

    public function scopeSpecialityName($query, $specialityName)
    {
        if ($specialityName) {
            return $query->whereHas('doctor.speciality', function ($query) use ($specialityName) {
                $query->where('specialityName', 'like', '%' . $specialityName . '%');
            });
        }
    }


}
