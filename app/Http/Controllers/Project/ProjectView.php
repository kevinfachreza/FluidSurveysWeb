<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectView extends Controller
{
    public function showAllProject()
    {
        return view('home');
    }

    public function showProject($id)
    {
    		$data['project_id'] = $id;
        	return view('project.index',$data);
    }
}
