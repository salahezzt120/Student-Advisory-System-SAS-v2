<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Outcome;
use App\Models\Category;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class OutcomesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
        // Fetch required data from the users table
        // $usersData = User::select('id', 'gpa', 'AIU_ID', 'problem', 'stutes')->orderBy('created_at', 'DESC')->get();

        $user = User::find(auth()->id());

        // Pass the data to the view
        return view('cregistration.index', compact('user'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::latest()->get();
        $courses = Course::latest()->get();

        return view('cregistration.create', compact('programs'),compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'problem' => 'required|string',
        // Add more validation rules as needed
    ]);

    // Get the current authenticated user
    $user = auth()->user();

    // Update the 'problem' column in the user's record
    $user->update(['problem' => $validatedData['problem']]);

    // Redirect back to the index view with a success message
    return redirect()->route('cregistration')->with('success', 'Problem submitted successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $outcome = Outcome::findOrFail($id);

        return view('cregistration.show', compact('outcome'));
    }



    public function showcourses($id)
{
    $program = Program::find($id);


    $courseslist = Course::whereHas('cprogram', function ($q) use ($id) {
        $q->where('program_courses.pid', '=', $id);
    })->get()->toArray();

    // $courseslist = Course::with('cprogram')->where('id','=',$id)->get();


    $coursesData['data'] = $courseslist;


    $parentArray['coursesData'] = $coursesData;

    echo json_encode($parentArray);
    exit;
}







    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $outcome = Outcome::findOrFail($id);

        return view('cregistration.edit', compact('outcome'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outcome = Outcome::findOrFail($id);

        $outcome->update($request->all());

        return redirect()->route('cregistration')->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outcome = Outcome::findOrFail($id);

        $outcome->delete();

        return redirect()->route('cregistration')->with('success', 'product deleted successfully');
    }
}
