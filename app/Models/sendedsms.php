<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sendedsms extends Model
{
    use HasFactory;

    protected $fillable = [
        'Body',
        'phone_id',
        'user_id',
        'To',
        'Rand'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
