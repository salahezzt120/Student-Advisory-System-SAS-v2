<?php

namespace App\Http\Controllers;

use App\Models\AdvisingMeeting;
use Illuminate\Http\Request;
use App\Models\User;

class AdvisingMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AdvisingMeeting = AdvisingMeeting::orderBy('created_at', 'DESC')->get();

        return view('ameeting.index',compact('AdvisingMeeting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::where('role_as', '!=', 1)->orderBy('name')->get(['id', 'name']);
    return view('ameeting.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'student' => 'required|exists:users,id', // Ensure the selected student exists in the users table
        'meeting_datetime' => 'required|date', // Ensure the meeting datetime is provided and is a valid date
        'notes' => 'nullable|string', // Allow notes to be optional and of string type
    ]);

    // Create a new instance of AdvisingMeeting with the validated data
    $advisingMeeting = new AdvisingMeeting();
    $advisingMeeting->user_id = $validatedData['student']; // Assign the user ID to the selected student
    $advisingMeeting->meeting_datetime = $validatedData['meeting_datetime']; // Assign the meeting datetime
    $advisingMeeting->notes = $validatedData['notes']; // Assign the meeting notes
    $advisingMeeting->save(); // Save the new advising meeting instance to the database

    // Redirect back to the index view with a success message
    return redirect()->route('ameeting')->with('success', 'Meeting scheduled successfully');
}



    /**
     * Display the specified resource.
     */
public function show(AdvisingMeeting $advisingMeeting)
{
    return view('ameeting.show', compact('advisingMeeting'));
}

    /**
     * Show the form for editing the specified resource.
     */
/**
 * Show the form for editing the specified resource.
 */
public function edit($id)
{
    $advisingMeeting = AdvisingMeeting::findOrFail($id);
    $students = User::where('role_as', '!=', 1)->orderBy('name')->get(['id', 'name']);
    return view('ameeting.edit', compact('advisingMeeting', 'students'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdvisingMeeting $advisingMeeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $AdvisingMeeting = AdvisingMeeting::findOrFail($id);

        $AdvisingMeeting->delete();

        return redirect()->route('ameeting')->with('success', 'Meeting cancled successfully');
    }
}
