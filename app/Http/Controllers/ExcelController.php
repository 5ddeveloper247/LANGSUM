<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ExcelController extends Controller
{
    //

    public function processExcel(Request $request)
    {
        // Validate the request
        $request->validate([
            'excel_file' => 'required|mimes:xlsx',
        ]);

        // Get the uploaded file from the request
        $excelFile = $request->file('excel_file');

        // Read the Excel file
        $data = Excel::toArray([], $excelFile);

        // Access the first sheet data (assuming the Excel file has only one sheet)
        $sheetData = $data[0];
        
        // print_r("<pre>");
        // print_r($sheetData);
        // exit();
        
        // Loop through the data and process as needed
        foreach ($sheetData as $key => $row) {
            
            if($key > 0 && $row[0] != ''){
                $dateValue = $row[0];
                $unixTimestamp = ($dateValue - 25569) * 86400; // Convert Excel date number to Unix timestamp

                // Convert Unix timestamp to Carbon date object
                $date = Carbon::createFromTimestamp($unixTimestamp);

                // Use the $date variable as needed in your application
                // For example, you can format it as a string
                $formattedDate = $date->format('Y-m-d');

                echo $formattedDate."<br>";
            }
        }
    }
}
