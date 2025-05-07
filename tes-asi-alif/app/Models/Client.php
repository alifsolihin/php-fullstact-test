<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'my_client';
    public $timestamps = false;

    protected $fillable = [
        'name', 'slug', 'is_project', 'self_capture', 'client_prefix',
        'client_logo', 'address', 'phone_number', 'city',
        'created_at', 'updated_at', 'deleted_at'
    ];
}
