<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['question_text', 'option1', 'option2', 'option3', 'option4', 'correct_answers', 'subject_id', 'chapter_id'];

    protected $casts = [
        'correct_answers' => 'array', // Cast correct_answers attribute to array
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
