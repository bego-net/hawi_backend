<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Table name (optional, Laravel auto uses "contacts")
    protected $table = 'contacts';

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
