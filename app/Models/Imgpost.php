<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Img;

class Imgpost extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'coverimg',
    ];

    public function imgs(){
        return $this->hasMany(Img::class);
    }
}
