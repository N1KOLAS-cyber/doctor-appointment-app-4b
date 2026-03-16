<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationMedication extends Model
{
    protected $table = 'consultation_medications';

    protected $fillable = [
        'consultation_id',
        'medication',
        'dose',
        'frequency_duration',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
