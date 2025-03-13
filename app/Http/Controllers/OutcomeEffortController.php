<?php

namespace App\Http\Controllers;

use App\Exports\AssessmentExport;
use App\Exports\FilteredAssessmentExport;
use App\Models\Course;
use App\Models\CourseEffort;
use App\Models\Outcome;
use App\Models\OutcomeEffort;
use Illuminate\Support\Facades\Redirect;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Excel;

use Maatwebsite\Excel\Facades\Excel;


class OutcomeEffortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $query = User::select('id', 'name', 'gpa', 'AIU_ID', 'problem', 'stutes', 'role_as')
                    ->where('role_as', '!=', 1) // Exclude users with role_as = 1
                    ->orderBy('created_at', 'DESC');

    // Check if AIU_ID filter is provided in the request
    if ($request->has('AIU_ID')) {
        $query->where('AIU_ID', $request->input('AIU_ID'));
    }

    // Fetch the filtered users
    $usersData = $query->get();

    return view('cassessment.index', compact('usersData'));
}


     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::latest()->get();
        $courses = Course::latest()->get();
        $outcomes = Outcome::with('oeffort')->get();
        $cefforing = CourseEffort::select('id', 'semester', 'year','cid')->get();
        // dd($cefforing);


        return view('cassessment.create', compact('programs','courses','cefforing','outcomes') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Program::create($request->all());

        return redirect()->route('programs')->with('success', 'Programs added successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);

        $cassessments = OutcomeEffort::findOrFail($id);

        return view('cassessment.show', compact('cassessments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the student by ID
        $user = User::findOrFail($id);

        // Load the edit view and pass the user data to it
        return view('cassessment.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the student by ID
        $user = User::findOrFail($id);

        // Update the user's data with the new values from the request
        $user->update($request->all());

        // Redirect the user back to the index page with a success message
        return Redirect::route('cassessments')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cassessments = OutcomeEffort::findOrFail($id);

        $cassessments->delete();

        return redirect()->route('cassessments')->with('success', 'program deleted successfully');
    }



public function showcourses($id)
{
    $program = Program::find($id);
    $cat_id = $program->cat_Id;

    // Fetch 'abet_code_sp' from the Program table
    $abetCodeSP = $program->abet_code;

    // Get outcomes with a specific category
    $outcomes = Outcome::whereHas('category')->get();

    // Get outcomes with the specific category ID
    $outcomeslist = Outcome::whereHas('category', function ($q) use ($cat_id) {
        $q->where('outcomes.cat_id', '=', $cat_id);
    })->get()->toArray();

    // If 'abet_code_sp' is found, add it to the $outcomeslist
    if (!empty($abetCodeSP)) {
        $outcomeslist[] = ['abet_code' => $abetCodeSP];
    }

    $courseslist = Course::whereHas('cprogram', function ($q) use ($id) {
        $q->where('program_courses.pid', '=', $id);
    })->get()->toArray();





    $coursesData['data'] = $courseslist;
    $outcomesData['data'] = $outcomeslist;




    $parentArray['coursesData'] = $coursesData;
    $parentArray['outcomesData'] = $outcomesData;

    echo json_encode($parentArray);
    exit;
}



   public function showyears($id)
    {

        $yearlist = CourseEffort::whereHas('course',function($q) use($id){
        $q->where('course_efforts.cid','=',$id);
        })->get()->toArray();
        // $outcomes = Outcome::whereHas('category')->get();
        // dd($yearlist);

        $coursesData['data']=$yearlist;

// dd($coursesData);
        echo json_encode($coursesData);
        exit;

    }



    public function showsemesters($id,$year)
    {
        // dd($id);

        $semesterlist = CourseEffort::whereHas('course',function($q) use($id,$year){
            $q->where('course_efforts.cid','=',$id)
            ->where('course_efforts.year','=',$year);
            })->get()->toArray();
            // $outcomes = Outcome::whereHas('category')->get();
            // dd($yearlist);

            $coursesData['data']=$semesterlist;

    // dd($coursesData);
            echo json_encode($coursesData);
            exit;

    }

   public function export(Request $request)
{
    // Export all data without filters
    return Excel::download(new AssessmentExport, 'StudentsRegistration.xlsx');
}


}
