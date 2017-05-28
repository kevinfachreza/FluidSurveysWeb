<?php

namespace App\Http\Controllers\AssignmentReport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssignmentReport;
use DB;
use App\User;

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

		$report = "SELECT * FROM assignment a, assignment_report ar
		WHERE a.id = ar.assignment_id
		AND ar.id = ".$id."";

		$report = DB::select($report);

		$report = $report[0];

		$id = $report->created_by;
		$user = User::find($id);
		$report->created_by = $user->name;


		return json_encode([
			'status' => 1,
			'report' => $report
			]);
	}

	public function getall(Request $request)
	{
		$id = $request->input('id');

		$report = "SELECT * FROM assignment a, assignment_report ar
		WHERE a.id = ar.assignment_id
		AND a.id = ".$id."";
		
		$report = DB::select($report);


		foreach($report as $tmp)
		{
			$id = $tmp->created_by;
			$user = User::find($id);
			$tmp->created_by = $user->name;
		}


		return json_encode([
			'status' => 1,
			'report' => $report
			]);
	}

	public function getLocation(Request $request)
	{

	}

	public function valuateReport(Request $request)
	{

		$id = $request->input('report_id');
		$assignment_id = $request->input('assignment_id');
		$message = $request->input('message');
		$ispc = $request->input('ispc');

		$report = AssignmentReport::find($id);
		$report->valuate_message = $message;
		$report->save();

		if($ispc)
		{
			return redirect('assignment/'.$assignment_id.'/report')->with('message', 'Assignment Created');
		}

		return json_encode([
			'status' => 1,
			'message' => 'Report has been valuated'
			]);
	}
}
