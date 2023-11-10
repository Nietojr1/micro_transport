<?php

namespace App\Http\Controllers;

use App\Models\Dataresponse;
use Illuminate\Http\Request;
use App\Services\ExportService;


class ExportDataController extends Controller
{
    public function allDataToExport()
    {
        return ExportService::getAllDataExport();
    }
}
