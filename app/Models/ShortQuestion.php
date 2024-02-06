<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'chapter_id', 'user_id', 'question', 'answer'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function chapter()
    {
        return $this->belongsTo('App\Chapter');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
