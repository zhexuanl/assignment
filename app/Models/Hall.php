<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hall extends Model
{
    use  Notifiable;
    protected $guard = 'hall';

    protected $fillable = [
        'name', 'capacity', 'type', 'description', 'fee'
    ];

}
