@extends('layouts.dashboard')

@section('content')
<div class="container" ng-cloak>
    <a class="btn btn-primary btn-round pull-right" href="{{url()->current()}}/assignment/create">
        <i class="fa fa-plus"></i> New Assignment
    </a>

    <button class="btn btn-secondary btn-round pull-right" data-toggle="modal" data-target="#myModal2" style="margin-right: 10px">
        <i class="fa fa-plus"></i> Invite Employee
    </button>


    <div ng-controller="ProjectController" >
        <h1 class="display-4"> @{{project.name}}<br>
        <small>@{{project.company}}</small></h1>
    </div>




    <div class="list-group" ng-controller="AssignmentController">
        <a ng-repeat="assignment in assignments" href="{{url('')}}/assignment/@{{assignment.id}}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">@{{assignment.title}}</h5>
                <small>@{{assignment.created_at}}</small>
            </div>
        </a>
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

       <form method="POST" action="{{url('api/project/collaborator/invite')}}">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Invite Employee<br>
                <small class="text-muted"> You will allow your employee to submit report about assignment</small></h4>
             
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="ispc" class="form-control" placeholder="With Border" value="1">
                </div>
                <div class="form-group">
                    <input type="hidden" name="project_id" class="form-control" placeholder="With Border" value="{{$project_id}}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" placeholder="With Border" value="{{Auth::user()->id}}">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email Pegawai">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info btn-fill">Invite Employee</button>
            </div>
        </form>
    </div>
</div>


@endsection

@section('angularjs')
<script type="text/javascript">
    app.controller("ProjectController", function($scope, $http) {
        data = {
            'project' : {{$project_id}}
        };

        $http({
            method: 'POST',
            url: '{{url('')}}/api/project/get',
            data: data
        }).then(function successCallback(response) {
            $scope.project = response.data.project;
        }, function errorCallback(response) {
            console.log(response);
        });
    });


    app.controller("AssignmentController", function($scope, $http) {
        data = {
            'project' : {{$project_id}}
        };

        $http({
            method: 'POST',
            url: '{{url('')}}/api/assignment/get/all',
            data: data
        }).then(function successCallback(response) {
            $scope.assignments = response.data.assignment;
            console.log(response);
        }, function errorCallback(response) {
            console.log(response);
        });
    });

</script>

@endsection