<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // For Admin, fetch total users and courses
        if (Auth::user()->role_as == 1) {
            $totalUsers = User::count();
            $totalCourses = Course::count();
            return view('dashboard', compact('totalUsers', 'totalCourses'));
        }

        // For Student, return simple dashboard
        return view('dashboard');
    }
}
