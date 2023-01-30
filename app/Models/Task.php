<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
// php artisan make:model Task
    protected $fillable = [
        'task',
        'user'
    ];
}