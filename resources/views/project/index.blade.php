@extends('layouts.dashboard')

@section('content')
<div class="container" ng-cloak>
    <a class="btn btn-primary btn-round pull-right" href="{{url()->current()}}/assignment/create">
        <i class="fa fa-plus"></i> New Assignment
    </a>
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