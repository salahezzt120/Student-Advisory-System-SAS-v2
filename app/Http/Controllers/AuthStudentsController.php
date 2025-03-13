<?php

namespace App\Http\Controllers;

use App\Models\AuthStudents;
use App\Models\students;

use App\Models\User;
use Illuminate\Http\Request;

class AuthStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->get();

        return view('AuthStudents.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $user = User::create($request->all());

            // Check if pid is not null, then store in programOutcomes table
 
            //     students::create([
            //         'user_Id' => $user->id,
            //         'AIUId' => $user->pid,
            //     ]);
            

            // DB::commit();

            return redirect()->route('AuthStudents')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AuthStudents $authStudents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthStudents $authStudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuthStudents $authStudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthStudents $authStudents)
    {
        //
    }
}
