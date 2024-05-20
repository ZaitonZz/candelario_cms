<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavBar extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_one_text', 
        'section_one_link', 
        'section_two_text', 
        'section_two_link',
        'section_three_text', 
        'section_three_link', 
        'section_four_text', 
        'section_four_link',
        'section_five_text',
        'section_five_link',
    ];
}
