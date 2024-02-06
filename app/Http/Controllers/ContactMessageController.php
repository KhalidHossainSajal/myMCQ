<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function index()
    {
        // Fetch all contact messages
        $contactMessages = ContactMessage::all();

        // Return view with contact messages data
   
        //   return view('contact_messages.index', ['contactMessages' => $contactMessages]);
    }

    public function create()
    {
        $user = Auth::user();

        if ($user) {
            $email = $user->email;
            $id = $user->id;
            
            return view('contact_messages.create_msg',['email' => $email, 'id' => $id]);
        } else {
            // No user is currently logged in
        }
        // Return view for creating a new contact message
        
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'mobile_no' => 'nullable|string|max:20',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        // Create a new contact message
        ContactMessage::create($validatedData);

        // Redirect to the contact messages index page with success message
      //  return redirect()->route('contact_messages.index')->with('success', 'Contact message created successfully.');
    }

    public function show(ContactMessage $contactMessage)
    {
        // Return view with the specified contact message data
        return view('contact_messages.show', ['contactMessage' => $contactMessage]);
    }

    public function edit(ContactMessage $contactMessage)
    {
        // Return view for editing the specified contact message
        return view('contact_messages.edit', ['contactMessage' => $contactMessage]);
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'mobile_no' => 'nullable|string|max:20',
        ]);

        // Update the contact message
        $contactMessage->update($validatedData);

        // Redirect to the contact messages index page with success message
        return redirect()->route('contact_messages.index')->with('success', 'Contact message updated successfully.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        // Delete the contact message
        $contactMessage->delete();

        // Redirect to the contact messages index page with success message
        return redirect()->route('contact_messages.index')->with('success', 'Contact message deleted successfully.');
    }
}
