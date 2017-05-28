<?php

namespace App\Http\Controllers\AssignmentReportDetail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssignmentReportDetail;
use App\AssignmentQuest;

class AssignmentReportDetailController extends Controller
{
	public function create(Request $request)
	{
		$assignment_quest_id = $request->input('assignment_quest_id');
		$assignment_report_id = $request->input('assignment_report_id');
		$answer = $request->input('answer');
		$img = $request->input('img');
		$id = $request->input('id');

		$quest = new AssignmentReportDetail;
		$quest->assignment_id = $assignment_id;
		$quest->assignment_report_id = $assignment_report_id;
		$quest->answer = $answer;
		$quest->answer_img = $img;
		$quest->created_by = $id;
		$quest->save();

		return json_encode([
			'status' => 1,
			'message' => 'Isi laporan berhasil ditambahkan'
			]);
	}

	public function edit(Request $request)
	{
		$answer = $request->input('answer');
		$img = $request->input('img');
		$id = $request->input('id');

		$quest = AssignmentReportDetail::find($id);
		$quest->answer = $answer;
		$quest->answer_img = $img;
		$quest->save();

		return json_encode([
			'status' => 1,
			'message' => 'Isi laporan berhasil diedit'
			]);
	}

	public function delete(Request $request)
	{
		$id = $request->input('id');

		$quest = AssignmentReportDetail::find($id);
		$quest->delete();

		return json_encode([
			'status' => 1,
			'message' => 'Isi laporan berhasil dihapus'
			]);
	}

	public function get(Request $request)
	{

		$assignment_id = $request->input('assignment_id');
		$report_id = $request->input('report_id');

		$details = AssignmentQuest::where('assignment_id',$assignment_id)->get();
		foreach($details as $tmp)
		{
			$tmp->answer = AssignmentReportDetail::where([['assignment_quest_id',$tmp->id],['assignment_report_id',$report_id]])->first();
		}
		return json_encode([
			'status' => 1,
			'detail' => $details
			]);
	}
}
