<?php

namespace App\Models;

use App\Models\User;
use App\Models\Keluhan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Respon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function keluhan()
    {
        return $this->belongsTo(Keluhan::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
