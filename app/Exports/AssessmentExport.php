<?php

namespace App\Exports;

use App\Models\OutcomeEffort;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;


// use Maatwebsite\Excel\Concerns\WithHeadings;


class AssessmentExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function collection()
    {
        return User::where('role_as', '!=', 1)->select('name', 'AIU_ID', 'gpa', 'stutes')->get();
    }

    public function headings(): array
    {
        // Define the column labels for the Excel sheet
        return [
        'Name',
         'ID',
        'CGPA',
        'Status',

        ];
    }
}
