<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DumpController extends Controller
{
    public function dump()
    {
        $string = 'mysqldump --user='.env('DB_USERNAME').' --password='.env('DB_PASSWORD').' --host='.env('DB_HOST').' '.env('DB_DATABASE').'';
        $dump = exec($string, $outputAndErrors, $return_value);
        foreach ($outputAndErrors as $line) {
            echo $line."<br>";
        }
        exit;
    }

}
