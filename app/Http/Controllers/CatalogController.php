<?php

namespace App\Http\Controllers;

use App\Models\catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('catalog.index');
    }


    public function coursesDescription()
    {
            return view('catalog.coursesDescription');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(catalog $catalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, catalog $catalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(catalog $catalog)
    {
        //
    }
}
