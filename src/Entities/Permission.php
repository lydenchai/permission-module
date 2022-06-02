<?php

namespace Lyden\Permission\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_At',
        'end_At',
        'type',
        'description'
    ];

    protected $casts = [
        'created_at' => 'date:D, d-m-y',
        'updated_at' => 'date:D, d-m-y'
    ];
}
