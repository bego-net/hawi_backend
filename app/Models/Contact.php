<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Laravel assumes the table name is "contacts"
    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    /**
     * A contact message can have many admin responses
     */
    public function responses()
    {
        return $this->hasMany(ContactResponse::class);
    }
}
