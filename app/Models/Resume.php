<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'age',
        'phone',
        'address',
        'worktitle',
        'workcompany',
        'educationdiscipline',
        'educationplace',
        'image'
    ];
}
