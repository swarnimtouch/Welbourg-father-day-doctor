<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $attributes = [
        'doctor_prefix' => 'Dr.',
    ];

    protected $fillable = ['employee_name', 'employee_code', 'employee_hq', 'doctor_prefix', 'doctor_name', 'doctor_qualification', 'doctor_phone', 'doctor_photo', 'doctor_banner_path'];

    public function getDisplayNameAttribute(): string
    {
        return trim(($this->doctor_prefix ?: 'Dr.') . ' ' . $this->doctor_name);
    }
}
