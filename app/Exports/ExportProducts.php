<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportProducts implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select("id", "productName", "productDescription")->get();
    }

    public function headings(): array
    {
        return [
        "ID", 
        "productName", 
        "productDescription"
    ];
    }
}
