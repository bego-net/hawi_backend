<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactResponse extends Model
{
    use HasFactory;

    protected $fillable = ['contact_id', 'admin_id', 'response'];

    /**
     * Response belongs to a contact message
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * Response belongs to an admin (User model)
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
