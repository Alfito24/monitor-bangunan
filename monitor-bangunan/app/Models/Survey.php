<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Proyek;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'surveys';
    // protected $guarded = [
    //     'id'
    // ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function proyek()
    {
        return $this->belongsToMany(Proyek::class);
    }
}
