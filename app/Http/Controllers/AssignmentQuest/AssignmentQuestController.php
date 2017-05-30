<?php

namespace App\Http\Controllers\AssignmentQuest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssignmentQuest;

class AssignmentQuestController extends Controller
{
    public function create(Request $request)
    {
		$assignment_id = $request->input('assignment_id');
		$question = $request->input('question');
		$upload_pict = $request->input('upload_pict');
		$id = $request->input('id');
		$ispc = $request->input('ispc');
		if($upload_pict == 'on') $upload_pict = 1;
		else $upload_pict = 0;

    		$quest = new AssignmentQuest;
		$quest->assignment_id = $assignment_id;
		$quest->question = $question;
		$quest->upload_pict = $upload_pict;
		$quest->created_by = $id;
		$quest->save();
		if($ispc)
		{
			return redirect('assignment/'.$assignment_id)->with('message', 'Assignment Created');
		}
		return json_encode([
			'status' => 1,
			'message' => 'Pertanyaan berhasil ditambahkan'
			]);
    }


    public function edit(Request $request)
    {
		$assignment_id = $request->input('assignment_id');
		$question = $request->input('question');
		$upload_pict = $request->input('upload_pict');
		$id = $request->input('id');
		$ispc = $request->input('ispc');
		if($upload_pict == 'on') $upload_pict = 1;
		else $upload_pict = 0;

    		$quest = AssignmentQuest::find($id);
		$quest->question = $question;
		$quest->upload_pict = $upload_pict;
		$quest->save();

		if($ispc)
		{
			return redirect('assignment/'.$assignment_id)->with('message', 'Assignment Created');
		}

		return json_encode([
			'status' => 1,
			'message' => 'Pertanyaan berhasil di-edit'
			]);
    }

    public function delete(Request $request)
    {
		$id = $request->input('id');
		$ispc = $request->input('ispc');

    		$quest = AssignmentQuest::find($id);
		$quest->delete();

		if($ispc)
		{
			return back()->with('message', 'Assignment Deleted');
		}

		return json_encode([
			'status' => 1,
			'message' => 'Pertanyaan berhasil dihapus'
			]);
    }


	public function get(Request $request)
	{
		$id = $request->input('id');

		$quest = AssignmentQuest::find($id);

		return json_encode([
			'status' => 1,
			'quest' => $quest
			]);
	}

	public function getall(Request $request)
	{
		$id = $request->input('id');

		$report = AssignmentQuest::where('assignment_id',$id)->get();

		return json_encode([
			'status' => 1,
			'questions' => $report
			]);
	}
}
