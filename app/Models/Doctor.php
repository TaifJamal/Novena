<?php

namespace App\Models;

use App\Models\Feature;
use App\Models\Schedule;
use App\Models\Appoinment;
use App\Models\Department;
use App\Models\DoctorDetail;
use App\Models\Qualification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
     use HasFactory, SoftDeletes;
     protected $guarded = [];

     public function appoinments()
     {
       return $this->hasMany(Appoinment::class);
     }
     public function features()
     {
        return $this->hasMany(Feature::class);
     }
     public function schedules()
     {
        return $this->belongsToMany(Schedule::class);
     }
     public function department()
     {
        return $this->belongsTo(Department::class);
     }
     public function qualifications()
     {
        return $this->hasMany(Qualification::class);
     }
}
