<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sentlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'Body',
        'To',
        'list_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function list(){
        return $this->belongsTo(listas::class,'list_id','id');
    }
}
