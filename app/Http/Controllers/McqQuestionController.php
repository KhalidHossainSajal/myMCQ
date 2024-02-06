<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\McqQuestion;

class McqQuestionController extends Controller
{
       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('mcq.create_mcq');
    }
    public function store(Request $request)
    {
        try {
            $question = new McqQuestion();
            $question->question_text = $request->input('question_text');
            $question->option1 = $request->input('option1');
            $question->option2 = $request->input('option2');
            $question->option3 = $request->input('option3');
            $question->option4 = $request->input('option4');
            $question->correct_answers = $request->input('correct_answers');
            $question->subject_id = $request->input('subject_id');
            $question->chapter_id = $request->input('chapter_id');
            $question->save();

            return response()->json($question, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to insert question.'], 500);
        }
    }

}
