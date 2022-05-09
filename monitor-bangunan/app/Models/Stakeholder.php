<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function proyek(){
        return $this->belongsToMany(Proyek::class);
    }

    public function variabel(){
        return $this->belongsToMany(Variabel::class);
    }
}
