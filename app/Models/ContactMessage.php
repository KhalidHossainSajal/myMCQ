<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['subject', 'message', 'mobile_no', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}