<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'section_one_icon',
        'section_one_text',
        'section_two_icon',
        'section_two_text',
    ];
}
