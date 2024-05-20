<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'field_one_text', 
        'field_one_placeholder', 
        'field_two_text',
        'field_two_placeholder',
        'field_three_text', 
        'field_three_placeholder', 
        'field_four_text',
        'field_four_placeholder',
        'button_text'
    ];
}
