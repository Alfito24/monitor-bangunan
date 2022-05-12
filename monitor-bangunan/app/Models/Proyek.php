<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Variabel;

class Proyek extends Model
{
    use HasFactory;
    protected $table = 'proyeks';
    protected $guarded = [
        'id'
    ];
    public function stakeholder(){
        return $this->belongsToMany(User::class);
    }
    public function variabel(){
        return $this->belongsToMany(Variabel::class);
    }
}
