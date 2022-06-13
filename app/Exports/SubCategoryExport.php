<?php

namespace App\Exports;

use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubcategoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subcategory::all();
    }

    public function headings(): array
    {
        return ["S.No","Category", "Name", "Slug", "Image", "Rank", "Short Desc", "Long Desc", "status", "Created_by", "Updated By","Created At","Updated At"];
    }
}
