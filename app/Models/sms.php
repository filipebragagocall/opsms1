<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sms extends Model
{
    use HasFactory;

    protected $fillable = [
        'From',
        'To',
        'Contrato',
        'Body',
        'smsid',
        'sent_id'
    ];

}
