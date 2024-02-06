<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   

    public function store(Request $request)
    {
     
       
         try {
           
            $data = [];

            foreach ($request->subjects as $subject) {
                $data[] = [
                    'name' => $subject['name'],
                    'description' => $subject['description'],
                ];
            }

            foreach ($data as $item) {
                // Create a new instance of the Subject model
                $subject = new Subjects();
    
                // Fill the model with data from the array
                $subject->fill($item);
    
                // Save the model instance to the database
                $subject->save();
            }

            // Return a JSON response indicating success
            return response()->json(['message' => 'Subjects created successfully'], 201);
        } catch (\Exception $e) {
            // If an exception occurs during the transaction, it will be caught here
            // and the transaction will be rolled back automatically
            return response()->json(['error' => $e->getMessage()], 422);
           
        }
        
    }
    
    public function get_subjects(Subjects $subjects){
        // Fetch all subjects from the database
        $subjects = Subjects::all();

        // Return the subjects as a JSON response
        return response()->json($subjects);
    }
    /**
     * Display the specified resource.
     */
    public function show(Subjects $subjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subjects $subjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subjects $subjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subjects $subjects)
    {
        //
    }
}
