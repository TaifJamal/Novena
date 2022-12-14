<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
     use HasFactory, SoftDeletes;
     protected $guarded = [];

     public function doctors()
     {
        return $this->belongsToMany(Doctor::class);
     }

     public function departments()
     {
        return $this->belongsToMany(Department::class);
     }
}
