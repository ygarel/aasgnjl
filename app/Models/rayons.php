<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rayons extends Model
{
    use HasFactory;

    protected $fillable = [
        'rayon', 'user_id'
    ];

    public function users() {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function students() {
        return $this->hasMany(Students::class);
    }
}
