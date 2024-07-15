<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image',
        'name',
        'title',
        'description',
        'alt',
        'base64'
    ];

}
