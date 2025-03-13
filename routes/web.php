<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdvisingMeetingController;
use App\Http\Controllers\OutcomesController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CourseEffortController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ScheduledMeetingController;
use App\Http\Controllers\OutcomeEffortController;
use App\Http\Controllers\AuthStudentsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;




Route::get('/', function () {
    return view('auth.login');
});



Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});



//user route
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


Route::middleware('auth')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });



   Route::get('student/meetings', [ScheduledMeetingController::class, 'studentIndex'])->name('student.meetings');

    Route::controller(OutcomesController::class)->prefix('cregistration')->group(function () {
        Route::get('', 'index')->name('cregistration');
        Route::get('create', 'create')->name('cregistration.create');
        Route::post('store', 'store')->name('cregistration.store');
        Route::get('showcourses/{id}', 'showcourses')->name('cregistration.showcourses');
        Route::get('show/{id}', 'show')->name('cregistration.show');
        Route::get('edit/{id}', 'edit')->name('cregistration.edit');
        Route::put('edit/{id}', 'update')->name('cregistration.update');
        Route::delete('destroy/{id}', 'destroy')->name('cregistration.destroy');
    });

        Route::controller(CatalogController::class)->prefix('catalog')->group(function () {
        Route::get('', 'index')->name('catalog');
        Route::get('coursesDescription', 'coursesDescription')->name('catalog.coursesDescription');

    });

        Route::controller(ScheduledMeetingController::class)->prefix('ScheduledMeeting')->group(function () {
        Route::get('', 'index')->name('ScheduledMeeting');

    });

        Route::controller(CatalogController::class)->prefix('catalog')->group(function () {
        Route::get('', 'index')->name('catalog');
        Route::get('coursesDescription', 'coursesDescription')->name('catalog.coursesDescription');
        // Route::post('store', 'store')->name('cregistration.store');
        // Route::get('show/{id}', 'show')->name('cregistration.show');
        // Route::get('edit/{id}', 'edit')->name('cregistration.edit');
        // Route::put('edit/{id}', 'update')->name('cregistration.update');
        // Route::delete('destroy/{id}', 'destroy')->name('cregistration.destroy');
    });

        Route::controller(AuthStudentsController::class)->prefix('AuthStudents')->group(function () {
        Route::get('', 'index')->name('AuthStudents');
        // Route::get('coursesDescription', 'coursesDescription')->name('catalog.coursesDescription');
        Route::post('store', 'store')->name('AuthStudents.store');
        // Route::get('show/{id}', 'show')->name('cregistration.show');
        // Route::get('edit/{id}', 'edit')->name('cregistration.edit');
        // Route::put('edit/{id}', 'update')->name('cregistration.update');
        // Route::delete('destroy/{id}', 'destroy')->name('cregistration.destroy');
    });

        Route::controller(StudentsController::class)->prefix('Students')->group(function () {
        Route::get('', 'index')->name('Students');
        // Route::get('coursesDescription', 'coursesDescription')->name('catalog.coursesDescription');
        Route::post('store', 'store')->name('Students.store');
        // Route::get('show/{id}', 'show')->name('cregistration.show');
        // Route::get('edit/{id}', 'edit')->name('cregistration.edit');
        // Route::put('edit/{id}', 'update')->name('cregistration.update');
        // Route::delete('destroy/{id}', 'destroy')->name('cregistration.destroy');
    });




    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    

//admin route
    Route::middleware(['auth', 'isAdmin'])->group(function () {



        Route::controller(ProgramController::class)->prefix('programs')->group(function () {
            Route::get('', 'index')->name('programs');
            Route::get('create', 'create')->name('programs.create');
            Route::post('store', 'store')->name('programs.store');
            Route::get('show/{id}', 'show')->name('programs.show');
            Route::get('edit/{id}', 'edit')->name('programs.edit');
            Route::put('edit/{id}', 'update')->name('programs.update');
            Route::delete('destroy/{id}', 'destroy')->name('programs.destroy');
        });
    
        Route::controller(CourseController::class)->prefix('courses')->group(function () {
            Route::get('', 'index')->name('courses');
            Route::get('create', 'create')->name('courses.create');
            Route::post('store', 'store')->name('courses.store');
            Route::get('show/{id}', 'show')->name('courses.show');
            Route::get('edit/{id}', 'edit')->name('courses.edit');
            Route::put('edit/{id}', 'update')->name('courses.update');
            Route::delete('destroy/{id}', 'destroy')->name('courses.destroy');
        });
    
        Route::controller(CourseEffortController::class)->prefix('cefforts')->group(function () {
            Route::get('', 'index')->name('cefforts');
            Route::get('create', 'create')->name('cefforts.create');
            Route::post('store', 'store')->name('cefforts.store');
            Route::get('show/{id}', 'show')->name('cefforts.show');
            Route::get('edit/{id}', 'edit')->name('cefforts.edit');
            Route::put('edit/{id}', 'update')->name('cefforts.update');
            Route::delete('destroy/{id}', 'destroy')->name('cefforts.destroy');
        });
    
        Route::controller(AdvisingMeetingController::class)->prefix('ameeting')->group(function () {
            Route::get('', 'index')->name('ameeting');
            Route::get('create', 'create')->name('ameeting.create');
            Route::post('store', 'store')->name('ameeting.store');
            Route::get('show/{id}', 'show')->name('ameeting.show');
            Route::get('edit/{id}', 'edit')->name('ameeting.edit');
            Route::put('edit/{id}', 'update')->name('ameeting.update');
            Route::delete('destroy/{id}', 'destroy')->name('ameeting.destroy');
        });
    
        Route::controller(OutcomeEffortController::class)->prefix('cassessments')->group(function () {
            Route::get('', 'index')->name('cassessments');
            Route::get('create', 'create')->name('cassessments.create');
            Route::post('store', 'store')->name('cassessments.store');
            Route::get('show/{id}', 'show')->name('cassessments.show');
            Route::get('edit/{id}', 'edit')->name('cassessments.edit');
            Route::put('edit/{id}', 'update')->name('cassessments.update');
            Route::delete('destroy/{id}', 'destroy')->name('cassessments.destroy');
            Route::get('showcourses/{id}', 'showcourses')->name('cassessments.showcourses');
            Route::get('addmore/{id}/{x}', 'addmore')->name('cassessments.addmore');
            Route::get('showyears/{id}', 'showyears')->name('cassessments.showyears');
            Route::get('showsemesters/{id}/{year}', 'showsemesters')->name('cassessments.semesters');
            Route::get('/export-cassesments','export')->name('cassessments.export');
        });
       


        
    });



    
});