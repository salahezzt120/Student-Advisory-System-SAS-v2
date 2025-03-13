<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FilteredAssessmentExport implements FromCollection, WithHeadings
{

    protected $filteredData;
    public function __construct($filteredData)
    {
        $this->filteredData = $filteredData;
    }

    public function collection()
    {
        return collect($this->filteredData);
    }

    public function headings(): array
    {
        return [
        'Name',
         'ID',
        'CGPA',
        'Status',
        ];
    }
}
