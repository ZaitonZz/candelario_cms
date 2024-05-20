<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'photo',
        'description',
        'years_number',
        'years_text',
        'projects_number',
        'projects_text',
        'frameworks_number',
        'frameworks_text',
        'button_text',
        'button_link',
        'button_icon',
    ];
}
