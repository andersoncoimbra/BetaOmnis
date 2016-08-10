<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Faturamento;
use Input;
use Db;
use Excel;

class ExcelController extends Controller
{
    //
    public function getExport()
    {
        $faturamento = Faturamento::all();
        $data = date('d-m-Y');
        Excel::create('Faturamento '.$data, function ($excel) use ($faturamento)
        {
            $excel->sheet('Faturamento', function ($sheet) use ($faturamento)
            {
                $sheet->fromArray($faturamento);
            });
        })->export('xlsx');
    }

}
