<?php

namespace App\Http\Controllers\ProjectCollaborator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProjectCollaborator;

class ProjectCollaboratorController extends Controller
{
	public function invite(Request $request)
	{
		$id = $request->input('id');
		$project_id = $request->input('project_id');
		$user_id = $request->input('user_id');

		$projectcollab = new ProjectCollaborator;
		$projectcollab->project_id = $project_id;
		$projectcollab->user_id = $id;
		$projectcollab->created_by = $id;
		$projectcollab->manager = 0;
		$projectcollab->save();


		return json_encode([
			'status' => 1,
			'message' => 'Invite Berhasil'
			]);
	}

	public function remove(Request $request)
	{
		
		$user_id = $request->input('user_id');
		$project_id = $request->input('project_id');

		$projectcollab = ProjectCollaborator::where([['user_id',$user_id],['project_id',$project_id]])->first();
		$projectcollab->delete();


		return json_encode([
			'status' => 1,
			'message' => 'User telah dihapus dari proyek'
			]);
	}
}
