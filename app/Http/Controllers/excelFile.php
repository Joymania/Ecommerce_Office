<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\Excelsales;
use Maatwebsite\Excel\Facades\Excel;
class excelFile extends Controller
{
    public function export() 
    {
        return Excel::download(new Excelsales, 'Total_Sales.xlsx');
    }
}
