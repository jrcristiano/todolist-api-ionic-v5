<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const TODO = 1;
    const DOING = 2;
    const DONE = 3;

    protected $fillable = [
        'id',
        'title',
        'description',
        'order',
        'status',
        'user_id'
    ];

    protected $hidden = ['updated_at'];
}
