<?php

namespace App\Http\Controllers\AssignmentReport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignmentReportView extends Controller
{
    public function showAllReport($id)
    {

		$data['assignment_id'] = $id;
		return view('assignmentreport.all',$data);
    }

    	public function showReport($id,$report_id)
    	{

		$data['assignment_id'] = $id;
		$data['report_id'] = $report_id;
		return view('assignmentreport.show',$data);
    	}
}
