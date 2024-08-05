<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function caseCategory()
    {
        return $this->belongsTo(CaseCategory::class);
    }

    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class);
    }

    public function patientDetail()
    {
        return $this->hasOne(PatientDetail::class);
    }

}
