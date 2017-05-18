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
		$img = $request->input('img');
		$type = $request->input('type');
		$id = $request->input('id');

    		$quest = new AssignmentQuest;
		$quest->assignment_id = $assignment_id;
		$quest->question = $question;
		$quest->img = $img;
		$quest->question_type = $type;
		$quest->created_by = $id;
		$quest->save();

		return json_encode([
			'status' => 1,
			'message' => 'Pertanyaan berhasil ditambahkan'
			]);
    }


    public function edit(Request $request)
    {
		$assignment_id = $request->input('assignment_id');
		$question = $request->input('question');
		$img = $request->input('img');
		$type = $request->input('type');
		$id = $request->input('id');

    		$quest = AssignmentQuest::find($id);
		$quest->question = $question;
		$quest->img = $img;
		$quest->question_type = $type;
		$quest->save();

		return json_encode([
			'status' => 1,
			'message' => 'Pertanyaan berhasil di-edit'
			]);
    }

    public function delete(Request $request)
    {
		$type = $request->input('type');
		$id = $request->input('id');

    		$quest = AssignmentQuest::find($id);
		$quest->delete();

		return json_encode([
			'status' => 1,
			'message' => 'Pertanyaan berhasil dihapus'
			]);
    }


	public function get(Request $request)
	{
		$id = $request->input('id');

		$report = AssignmentQuest::find($id);

		return json_encode([
			'status' => 1,
			'quest' => $quest
			]);
	}
}
