<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Imgpost;

class Img extends Model
{
    use HasFactory;  
    protected $fillable=[
        'image',
        'imgpost_id',
    ];

    public function imgposts(){
        return $this->belongsTo(Imgpost::class);
    }
}
