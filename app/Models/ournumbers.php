<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ournumbers extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_number'
    ];
}
