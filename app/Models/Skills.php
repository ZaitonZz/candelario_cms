<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'section_one',
        'section_two',
        'section_three',
        'section_four',
        'section_five',
    ];
}
