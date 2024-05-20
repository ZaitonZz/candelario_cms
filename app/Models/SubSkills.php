<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSkills extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'skill_text',
        'table_num',
        'position'
    ];
}
