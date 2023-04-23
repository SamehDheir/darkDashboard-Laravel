<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class books extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'desc',
        'price',
        'image',
        'section_id',
    ];  

     public function sections()
    {
        return $this->belongsTo(section::class,'section_id');
    }
    
}
