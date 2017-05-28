@extends('layouts.dashboard')

@section('content')
<div class="container" ng-cloak>
    <br>
    <h6> Assignment Information </h6>    
    <div>
        <div class="row">
            <div class="col-md-10" ng-controller="AssignmentController">
                <strong style="margin:0;"> @{{assignments.title}}</strong>
                <p class="text-muted">  
                    @{{assignments.desc}} <br>
                    @{{assignments.place_name}} <br>
                    @{{assignments.place_address}} 
                </p>
            </div>
        </div>
    </div>
    <hr>
    <h6> Report Information </h6>
    <div class="row">
        <div class="col-md-12" ng-controller="AssignmentReportController">
            <div>
                <div class=""  >
                    Created By : @{{assignmentreports.created_by}}<br>
                    Created At : @{{assignmentreports.created_at}}<br>
                    Location : @{{assignmentreports.place_address}}
                </div>
                <hr>
            </div>
        </div>
    </div>


    <h6> Report Result </h6>
    <div class="row">
        <div class="col-md-12" ng-controller="AssignmentReportDetailController">
            <div>
                <div class="" ng-repeat="detail in reportdetails" >
                    <div class="" style="margin-bottom: 10px">
                        <strong>@{{detail.question}}</strong><br>
                        Answer : @{{detail.answer.answer}}<br>
                        <img src="{{asset('')}}@{{detail.answer.answer_img}}" ng-if="detail.upload_pict" height="100">
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

    <h6> Valuate Report </h6>
    <div class="row">
        <div class="col-md-12" ng-controller="AssignmentReportDetailController">
            <form method="POST" action="{{url('')}}/api/assignment/report/valuate">
                <textarea class="form-control" placeholder="Type Here"" rows="5" style="margin-bottom: 20px" name="message"></textarea>
                <input type="hidden" value="1" name="ispc">
                <input type="hidden" value="{{$report_id}}" name="report_id">
                <input type="hidden" value="{{$assignment_id}}" name="assignment_id">
                <button type="submit" class="btn btn-primary">Valuate</button>
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
            'id' : {{$report_id}}
        };

        $http({
            method: 'POST',
            url: '{{url('')}}/api/assignment/report/get',
            data: data
        }).then(function successCallback(response) {
            $scope.assignmentreports = response.data.report;
            console.log(response);
        }, function errorCallback(response) {
            console.log(response);
        });
    });

    app.controller("AssignmentReportDetailController", function($scope, $http) {
        data = {
            'assignment_id' : {{$assignment_id}},
            'report_id' : {{$report_id}}
        };

        $http({
            method: 'POST',
            url: '{{url('')}}/api/assignment/report/detail/get',
            data: data
        }).then(function successCallback(response) {
            $scope.reportdetails = response.data.detail;
            console.log(response);
        }, function errorCallback(response) {
            console.log(response);
        });
    });


</script>

@endsection