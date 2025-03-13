<?php

namespace App\Http\Controllers;

use App\Models\AdvisingMeeting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScheduledMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the current authenticated user
        $currentUser = Auth::user();

        // Retrieve the scheduled meetings for the current user (student or advisor)
        // Assuming 'user_id' is the foreign key in AdvisingMeeting and AIU_Id is the student ID
        $scheduledMeetings = AdvisingMeeting::where('user_id', $currentUser->AIUId)->get();

        // Pass the scheduled meetings data to the index view
        return view('ScheduledMeeting.index', compact('scheduledMeetings'));
    }

    /**
     * Show the form for creating a new scheduled meeting.
     */
    public function create()
    {
        // Retrieve available students or advisors based on logic
        // Example: Get all students for the advisor to schedule a meeting with
        $students = User::where('role_as', 0)->get(); // Adjust based on your roles

        return view('ScheduledMeeting.create', compact('students'));
    }

    /**
     * Store a newly created scheduled meeting in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'student_id' => 'required|exists:users,id',
            'meeting_date' => 'required|date',
            'meeting_time' => 'required|date_format:H:i',
            'notes' => 'nullable|string',
        ]);

        // Store the new scheduled meeting
        $scheduledMeeting = new AdvisingMeeting();
        $scheduledMeeting->user_id = $request->student_id; // Assuming student_id is being passed from the form
        $scheduledMeeting->advisor_id = Auth::id(); // The logged-in advisor
        $scheduledMeeting->meeting_date = $validatedData['meeting_date'];
        $scheduledMeeting->meeting_time = $validatedData['meeting_time'];
        $scheduledMeeting->notes = $validatedData['notes'] ?? null;
        $scheduledMeeting->save();

        return redirect()->route('ScheduledMeeting')->with('success', 'Meeting scheduled successfully!');
    }

    /**
     * Display the details of the selected scheduled meeting.
     */
    public function show($id)
    {
        $scheduledMeeting = AdvisingMeeting::findOrFail($id);

        // Pass the scheduled meeting data to the show view
        return view('ScheduledMeeting.show', compact('scheduledMeeting'));
    }

    /**
     * Show the form for editing the specified scheduled meeting.
     */
    public function edit($id)
    {
        $scheduledMeeting = AdvisingMeeting::findOrFail($id);
        $students = User::where('role_as', 0)->get(); // Adjust based on your roles
        return view('ScheduledMeeting.edit', compact('scheduledMeeting', 'students'));
    }

    /**
     * Update the specified scheduled meeting.
     */
    public function update(Request $request, $id)
    {
        // Find the scheduled meeting
        $scheduledMeeting = AdvisingMeeting::findOrFail($id);

        // Validate and update the scheduled meeting data
        $validatedData = $request->validate([
            'meeting_date' => 'required|date',
            'meeting_time' => 'required|date_format:H:i',
            'notes' => 'nullable|string',
        ]);

        $scheduledMeeting->meeting_date = $validatedData['meeting_date'];
        $scheduledMeeting->meeting_time = $validatedData['meeting_time'];
        $scheduledMeeting->notes = $validatedData['notes'] ?? null;
        $scheduledMeeting->save();

        return redirect()->route('ScheduledMeeting')->with('success', 'Meeting updated successfully!');
    }

    /**
     * Remove the specified scheduled meeting.
     */
    public function destroy($id)
    {
        // Find and delete the scheduled meeting
        $scheduledMeeting = AdvisingMeeting::findOrFail($id);
        $scheduledMeeting->delete();

        return redirect()->route('ScheduledMeeting')->with('success', 'Meeting canceled successfully!');
    }

    /**
     * Display a listing of the student's scheduled meetings.
     */
    public function studentIndex()
    {
        // Get the authenticated user's ID
        $studentId = Auth::id();

        // Retrieve the meetings for the authenticated student, ordered by meeting date
        $scheduledMeetings = AdvisingMeeting::where('user_id', $studentId)
                                             ->orderBy('meeting_datetime', 'ASC')
                                             ->get();

        // Return the student-specific meetings view
        return view('ScheduledMeeting.studentIndex', compact('scheduledMeetings'));
    }
}
