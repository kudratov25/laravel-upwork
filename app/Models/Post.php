<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'file',
        'file_original_name',
        'amount',
        'title',
        'scope',
        'duration',
        'experience',
        'is_full_time',
        'budget_type',
        'description'
    ];
}
