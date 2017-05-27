@extends('layouts.dashboard')

@section('content')
<div class="container" ng-controller="ProjectController" ng-cloak>
    <button class="btn btn-primary btn-round pull-right" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus"></i> New Project
    </button>
    <h1 class="display-4"> Projects </h1>
    <div class="list-group">
        <a ng-repeat="project in projects" href="{{url('')}}/project/@{{project.id}}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">@{{project.name}}</h5>
                <small>@{{project.created_at}}</small>
            </div>
            <p class="mb-1">@{{project.company}}</p>
        </a>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

       <form method="POST" action="{{url('api/project/create')}}">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New Project</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" placeholder="With Border" value="{{Auth::user()->id}}">
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Project Title" value="">
                </div>
                <div class="form-group">
                    <input type="text" name="company" class="form-control" placeholder="Project's Company" value="">
                </div>
                <div class="form-group">
                    <input type="hidden" name="ispc" class="form-control" value="1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info btn-fill">Create Project</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection

@section('angularjs')
<script type="text/javascript">
    app.controller("ProjectController", function($scope, $http) {
      data = {
        'id' : {{Auth::user()->id}}
    };

    $http({
        method: 'POST',
        url: '{{url('')}}/api/project/get/all',
        data: data
    }).then(function successCallback(response) {
        console.log(response);
        $scope.projects = response.data.project;
        console.log($scope.projects);
    }, function errorCallback(response) {
        console.log(response);
    });

});

</script>

@endsection