<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
    protected $table = 'section';
    protected $fillable = [
        'grade',
        'section',
    
    ];
}
