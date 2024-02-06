<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('chapter.create_chapter');
    }

    public function store(Request $request)
{
    try {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'subject_id' => 'required|integer',
        ]);
       
       
        $chapter = new Chapter;

         // Assign the validated data to the model attributes
         $chapter->name = $validatedData['name'];
         $chapter->description = $validatedData['description'];
         $chapter->subject_id = $validatedData['subject_id'];
 
         // Save the model to the database
         $chapter->save();

        // Optionally, you can return a response or redirect to a specific route
        return response()->json(['message' => 'Chapter stored successfully', 'data' => $chapter], 201);
    } catch (\Exception $e) {
        // Log the error or handle it accordingly
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function get_chapters(Chapter $chapters){
    // Fetch all subjects from the database
    $chapter = Chapter::all();

    // Return the subjects as a JSON response
    return response()->json($chapter);
}
public function getChaptersById($subjectId)
{
    // Your logic to fetch chapters based on $subjectId
    // For example:
    $chapters = Chapter::where('subject_id', $subjectId)->get();

    // Return the chapters as JSON response
    return response()->json($chapters);
}


    

}
