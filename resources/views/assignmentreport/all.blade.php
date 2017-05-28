@extends('layouts.dashboard')

@section('content')
<div class="container" ng-cloak>
    <br>
    <h6> Assignment Information </h6>
    <hr>
    <div  style="margin-bottom: 20px">
        <div class="row">
            <div class="col-md-10" ng-controller="AssignmentController">
                <h3 style="margin:0;"> @{{assignments.title}}</h3>
                <p class="text-muted">  
                    @{{assignments.desc}} <br>
                    @{{assignments.place_name}} <br>
                    @{{assignments.place_address}} </p>
                </div>
            </div>
        </div>
        <hr>
        <h6> Report List </h6>
        <div class="row">
            <div class="col-md-12" ng-controller="AssignmentReportController">
                <div ng-repeat="report in assignmentreports">
                    <div class=""  >
                        <h5>@{{$index +1}}. @{{report.created_by}}
                        <div class="pull-right">
                            <a class="btn btn-danger btn-sm btn-simple" ng-if="!report.valuate_message" href="{{url()->current()}}/@{{report.id}}">Valuate</a>
                            <a class="btn btn-danger btn-sm btn-simple" ng-if="report.valuate_message" disabled><i class="fa fa-check"></i></a>
                        </div>
                        <br>
                        <small style="font-size: 0.8rem" class="text-info">@{{report.created_at}}</small>
                        </h5>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>


    @endsection

    @section('angularjs')
    <script type="text/javascript">
        app.controller("AssignmentController", function($scope, $http) {
            data = {
                'id' : {{$assignment_id}}
            };

            $http({
                method: 'POST',
                url: '{{url('')}}/api/assignment/get',
                data: data
            }).then(function successCallback(response) {
                $scope.assignments = response.data.assignment;
                console.log(response);
            }, function errorCallback(response) {
                console.log(response);
            });
        });

        app.controller("AssignmentReportController", function($scope, $http) {
            data = {
                'id' : {{$assignment_id}}
            };

            $http({
                method: 'POST',
                url: '{{url('')}}/api/assignment/report/get/all',
                data: data
            }).then(function successCallback(response) {
                $scope.assignmentreports = response.data.report;
                console.log(response);
            }, function errorCallback(response) {
                console.log(response);
            });
        });

        app.controller("AssignmentQuestController", function($scope, $http) {
            data = {
                'id' : {{$assignment_id}}
            };

            $http({
                method: 'POST',
                url: '{{url('')}}/api/assignment/quest/get/all',
                data: data
            }).then(function successCallback(response) {
                $scope.questions = response.data.questions;
                console.log(response);
            }, function errorCallback(response) {
                console.log(response);
            });
        });


    </script>

    @endsection