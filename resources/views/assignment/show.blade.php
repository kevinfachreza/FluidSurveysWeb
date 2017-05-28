@extends('layouts.dashboard')

@section('content')
<div class="container" ng-cloak>
    <button class="btn btn-primary btn-round pull-right" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus"></i> New Questions
    </button>
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
                <div class="col-md-2 text-center " ng-controller="AssignmentReportController">
                    <a href="{{url()->current()}}/report">
                        <section data-background-color="orange" style="padding:10px" class="rounded">
                            <h6 style="margin: 0">Report Submitted</h6>
                            <h4 class="display-4" style="margin: 10px;">@{{assignmentreports.length}}</h4>
                        </section>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <h6> Questions List </h6>
        <div class="row">
            <div class="col-md-12" ng-controller="AssignmentQuestController">
                <div ng-repeat="question in questions">
                    <div class=""  style="height: 55px" >
                        <h5>@{{$index +1}}. @{{question.question}}
                        <div class="pull-right">
                            <button class="btn btn-info btn-sm btn-simple" data-toggle="modal" data-target="#editQuest@{{question.id}}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-sm btn-simple" data-toggle="modal" data-toggle="modal" data-target="#deleteQuest@{{question.id}}"><i class="fa fa-trash"></i></button>
                        </div>
                        <br>
                            <small ng-if="question.upload_pict" style="font-size: 0.8rem" class="text-info">*Require Photo Upload</small>
                        </h5>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">

         <form method="POST" action="{{url('api/assignment/quest/create')}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">New Questions</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" placeholder="With Border" value="{{Auth::user()->id}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="question" class="form-control" placeholder="Questions" value="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="assignment_id" class="form-control" placeholder="Questions" value="{{$assignment_id}}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="ispc" class="form-control" value="1">
                    </div>
                    <input type="checkbox" name="upload_pict"/> Upload Picture
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info btn-fill">Add Question</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div ng-controller="AssignmentQuestController">
        <div class="modal fade" id="editQuest@{{question.id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  ng-repeat="question in questions">
            <div class="modal-dialog">

             <form method="POST" action="{{url('api/assignment/quest/edit')}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Edit Questions</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" placeholder="With Border" value="@{{question.id}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="question" class="form-control" placeholder="Questions" value="@{{question.question}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="assignment_id" class="form-control" placeholder="Questions" value="{{$assignment_id}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="ispc" class="form-control" value="1">
                        </div>
                        <input type="checkbox" name="upload_pict" ng-checked="@{{question.upload_pict}}"/> Upload Picture
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info btn-fill">Add Question</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div ng-controller="AssignmentQuestController">
        <div class="modal fade" id="deleteQuest@{{question.id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  ng-repeat="question in questions">
            <div class="modal-dialog">

             <form method="POST" action="{{url('api/assignment/quest/delete')}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Delete Questions</h4>
                    </div>
                    <div class="modal-body">
                        <p>@{{question.question}}</p>
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" placeholder="With Border" value="@{{question.id}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="ispc" class="form-control" value="1">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info btn-fill">Delete</button>
                    </div>
                    </div>
                </form>
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