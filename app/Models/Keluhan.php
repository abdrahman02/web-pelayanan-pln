<?php

namespace App\Models;

use App\Models\User;
use App\Models\Respon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluhan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function respon()
    {
        return $this->hasOne(Respon::class, 'keluhan_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
