<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectCollaborator;
use Auth,DB;

class ProjectController extends Controller
{
	public function create(Request $request)
	{

		try
		{
			$id = $request->input('id');
			$name = $request->input('name');
			$company = $request->input('company');

			$project = new Project;
			$project->name = $name;
			$project->company = $company;
			$project->created_by = $id;
			$project->save();

			$projectcollab = new ProjectCollaborator;
			$projectcollab->project_id = $project->id;
			$projectcollab->user_id = $id;
			$projectcollab->created_by = $id;
			$projectcollab->manager = 1;
			$projectcollab->save();
		}
		catch (\Exception $e) {	
			return json_encode([
				'status' => 0,
				'message' => 'Kesalahan Server. Silahkan coba lagi'
				]);
		}


		return json_encode([
			'status' => 1,
			'message' => 'Project Berhasil Dibuat.',
			'project' => $project
			]);
	}

	public function get(Request $request)
	{
		$project = $request->input('project');
		$project = Project::find($project);

		return json_encode([
			'status' => 1,
			'project' => $project
			]);
	}

	public function edit(Request $request)
	{
		try
		{
			$id = $request->input('id');
			$name = $request->input('name');
			$company = $request->input('company');

			$project = Project::find($id);
			$project->name = $name;
			$project->company = $company;
			$project->save();
		}
		catch (\Exception $e) {	
			return json_encode([
				'status' => 0,
				'message' => 'Kesalahan Server. Silahkan coba lagi'
				]);
		}


		return json_encode([
			'status' => 1,
			'message' => 'Project Berhasil Di-edit.',
			'project' => $project
			]);
	}

	public function getall(Request $request)
	{
		$id = $request->input('id');
		
		$query = "SELECT p.* FROM project p, project_collaborator pc
		WHERE p.id = pc.project_id 
		AND pc.user_id = ".$id."
		and pc.deleted_at is null
		ORDER BY p.updated_at desc";

		$project = DB::select($query);
		return json_encode([
			'status' => 1,
			'project' => $project
			]);
	}
}
