<?php

namespace App\Http\Controllers\Assignment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignmentView extends Controller
{
	public function showAssignment($id)
	{
		$data['assignment_id'] = $id;
		return view('assignment.show',$data);
	}


	public function createAssignment($id)
	{

		$data['project_id'] = $id;
		return view('assignment.create',$data);
	}
}
