<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'record_year',
        'record_title',
        'record_subtitle',
        'table_num',
        'position'
    ];
}
