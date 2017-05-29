<?php

namespace App\Http\Controllers\Assignment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Assignment;
use DB;

class AssignmentController extends Controller
{
	public function create(Request $request)
	{

		try
		{
			$title = $request->input('title');
			$project_id = $request->input('project_id');
			$desc = $request->input('desc');
			$id = $request->input('id');
			$place = $request->input('place');
			$address = $request->input('address');
			$lat = $request->input('lat');
			$lng = $request->input('lng');
			$ispc = $request->input('ispc');

			$assignment = new Assignment;
			$assignment->title = $title;
			$assignment->project_id = $project_id;
			$assignment->desc = $desc;
			$assignment->created_by = $id;
			$assignment->place_name = $place;
			$assignment->place_address = $address;
			$assignment->lat = $lat;
			$assignment->lng = $lng;
			$assignment->save();
		}
		catch (\Exception $e) {	
			if($ispc)
			{
				return back()->with('message', 'Server Error. Please Try Again');
			}
			else
			{
				return json_encode([
					'status' => 0,
					'message' => 'Kesalahan Server. Silahkan coba lagi'
					]);
			}
		}

		if($ispc)
		{
			return redirect('project/'.$project_id)->with('message', 'Assignment Created');
		}
		else
		{
			return json_encode([
				'status' => 1,
				'message' => 'Assignment Berhasil Dibuat.',
				'assignment' => $assignment
				]);
		}
	}

	public function get(Request $request)
	{
		$id = $request->input('id');
		$assignment = Assignment::find($id);

		return json_encode([
			'status' => 1,
			'assignment' => $assignment
			]);
	}

	public function edit(Request $request)
	{

		try
		{
			$id = $request->input('id');
			$title = $request->input('title');
			$desc = $request->input('desc');
			$place = $request->input('place');
			$address = $request->input('address');
			$lat = $request->input('lat');
			$lng = $request->input('lat');

			$assignment = Assignment::find($id);
			$assignment->title = $title;
			$assignment->desc = $desc;
			$assignment->place_name = $place;
			$assignment->place_address = $address;
			$assignment->lat = $lat;
			$assignment->lng = $lng;
			$assignment->save();
		}
		catch (\Exception $e) {	
			return json_encode([
				'status' => 0,
				'message' => 'Kesalahan Server. Silahkan coba lagi'
				]);
		}


		return json_encode([
			'status' => 1,
			'message' => 'Assignment Berhasil Di-edit.',
			'assignment' => $assignment
			]);
	}

	public function getall(Request $request)
	{
		$project = $request->input('project');
		
		$query = "SELECT a.* FROM project p, project_collaborator pc, assignment a
		WHERE p.id = pc.project_id 
		AND a.project_id = p.id
		AND p.id = ".$project."
		and pc.deleted_at is null
		ORDER BY a.updated_at desc;";

		$assignment = DB::select($query);
		return json_encode([
			'status' => 1,
			'assignment' => $assignment
			]);
	}
}
