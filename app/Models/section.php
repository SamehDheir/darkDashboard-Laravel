<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class section extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'sections';
    protected $fillable = [
        'name',
        'desc',
        'created_by',
    ];

     public function book()
    {
      return $this->hasMany(books::class);
    }
    
}
