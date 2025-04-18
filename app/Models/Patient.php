<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';

    protected $fillable = ['nama', 'alamat', 'telepon', 'hospital_id'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
