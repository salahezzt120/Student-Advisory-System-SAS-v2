<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Students;
use App\Models\Program;
use App\Models\User;
use App\Models\ProgramCourse;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->id());
        return view('Students.index', compact('user'));
    }





     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $programs = Program::latest()->get();

        // return view('courses.create', compact('programs'));
    }




public function store(Request $request)
{

    //     DB::beginTransaction();

    // $validatedData = $request->validate([
    //     'AIUId' => 'required|integer|unique:students,AIUId',
    //     'gpa' => 'required|numeric',
    // ]);


    // $student = new Students();
    // $student->user_Id = auth()->id();
    // $student->AIUId = $validatedData['AIUId'];
    // $student->gpa = $validatedData['gpa'];
    //     dd($student);

    // $student->save();

    // DB::commit();
    //        return $request;


    // return redirect()->route('Students')->with('success', 'Data updated successfully');
}




    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        $courses = Course::findOrFail($code);

        return view('courses.show', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $code)
    {
        $courses = Course::findOrFail($code);

        return view('courses.edit', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $code)
    {
        $courses = Course::findOrFail($code);

        $courses->update($request->all());

        return redirect()->route('courses')->with('success', 'course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code)
    {
        $courses = Course::findOrFail($code);

        $courses->delete();

        return redirect()->route('courses')->with('success', 'course deleted successfully');
    }
}
