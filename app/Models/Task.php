<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    const TODO = 1;
    const DOING = 2;
    const DONE = 3;

    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
        'user_id'
    ];

    protected $hidden = ['updated_at'];
}
