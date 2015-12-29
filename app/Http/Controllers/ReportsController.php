<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Jobs\CompileReports;

class ReportsController extends Controller
{
    public function index(Request $request) {
        
        $job = new CompileReports($request->input('reportId'), $request->input('type'));
        $this->dispatch($job);
        
        return 'Done';
    }
}
