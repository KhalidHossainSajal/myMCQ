<?php

namespace App\Http\Controllers;

use App\Models\ShortQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shortQuestions = ShortQuestion::all();
        return view('short_questions.index', compact('shortQuestions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if ($user) {
            $email = $user->email;
            $id = $user->id;
            return view('short_questions.create_short_question',['email' => $email, 'id' => $id]);
        } else {
            // No user is currently logged in
        }
       
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the incoming request data
    $validatedData = $request->validate([
        'subject_id' => 'required',
        'chapter_id' => 'required',
        'question' => 'required|string',
        'answer' => 'required|string',
    ]);
    $validatedData['is_published'] = false;
    $validatedData['user_id'] = Auth()->user()->id;
    // Create a new instance of your model with the validated data
   // $ShortQuestion = ShortQuestion::create($validatedData);
   $shortQuestion = new ShortQuestion();
   $shortQuestion->subject_id = $validatedData['subject_id'];
   $shortQuestion->chapter_id = $validatedData['chapter_id'];
   $shortQuestion->question = $validatedData['question'];
   $shortQuestion->answer = $validatedData['answer'];
   $shortQuestion->user_id = $validatedData['user_id'];
   $shortQuestion->is_published = $validatedData['is_published'];
   $shortQuestion->save();

    // Optionally, you can return a response indicating success
    //return response()->json(['message' => 'Successfully created.', 'data' => $modelInstance], 201);
       return $validatedData; 
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortQuestion $shortQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortQuestion $shortQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShortQuestion $shortQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortQuestion $shortQuestion)
    {
        //
    }
}
