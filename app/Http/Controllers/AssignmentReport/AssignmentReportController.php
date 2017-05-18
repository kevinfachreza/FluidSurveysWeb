<?php

namespace App\Http\Controllers\AssignmentReport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssignmentReport;

class AssignmentReportController extends Controller
{
	public function create(Request $request)
	{
		$id = $request->input('id');
		$assignment_id = $request->input('assignment_id');

		$report = new AssignmentReport;
		$report->assignment_id = $assignment_id;
		$report->created_by = $id;
		$report->save();


		return json_encode([
			'status' => 1,
			'message' => 'Buat Laporan Berhasil'
			]);
	}

	public function get(Request $request)
	{
		$id = $request->input('id');

		$report = "SELECT * FROM assignment a, assignment_quest aq, assignment_report ar, assignment_report_detail ard
		WHERE a.id = ar.assignment_id
		AND a.id = ar.assignment_id
		AND ard.assignment_report_id = ar.id
		AND ard.assignment_quest_id = aq.id
		AND ar.id = ".$id."";


		$report = DB::select($query);
		return json_encode([
			'status' => 1,
			'report' => $report
			]);
	}

	public function getLocation(Request $request)
	{

	}
}
