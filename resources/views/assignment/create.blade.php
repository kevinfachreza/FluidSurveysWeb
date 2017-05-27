@extends('layouts.dashboard')

@section('header')
<style type="text/css">
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
    #map {
      height: 500px;
  }
  #floating-panel {
  }

</style>
@endsection

@section('content')
<div class="container" ng-cloak>


    <div ng-controller="ProjectController" >
        <h1 class="display-4"> @{{project.name}}<br>
            <small>@{{project.company}}</small></h1>
        </div>

        <h4> Create New Assignment </h1>
            <hr>
            <form class="" method="POST" action="{{url('api/assignment/create')}}">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input class="form-control" name="title" type="text" placeholder="Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Project ID</label>
                    <div class="col-10">
                        <input class="form-control" name="project_id" type="text" placeholder="Title" value="{{$project_id}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">User ID</label>
                    <div class="col-10">
                        <input class="form-control" name="id" type="text" placeholder="Title" value="{{Auth::user()->id}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <input class="form-control" name="desc" type="text" placeholder="Description">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Place Name</label>
                    <div class="col-10">
                        <input class="form-control" name="place" type="text" placeholder="Place">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Address</label>
                    <div class="col-10">
                        <input id="formAddress" class="form-control" name="address" type="text" placeholder="Address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Longitude</label>
                    <div class="col-10">
                        <input class="form-control" id="lng" name="lng" type="text" placeholder="Address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Latitude</label>
                    <div class="col-10">
                        <input class="form-control" id="lat" name="lat" type="text" placeholder="Address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <button  type="submit" class="btn btn-primary">Create Assignment</button>
                    </div>
                </div>
            </form>
            <hr>
            <div id="floating-panel" class="row">
                <div class="col-md-4">
                <input type="text" class="form-control" id="address" placeholder="Type Place or Address">
                </div>
                <div class="col-md-2">                    
                    <button  id="submit"  type="button" class="btn btn-secondary">Find Address</button>
                </div>
            </div>

        <div id="map"  style="margin-top: 10px"></div>
        <!-- Replace the value of the key parameter with your own API key. -->
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5D4tKgQDSuRgOJ05XIgtOrdJdX21xZYk&callback=initMap">
    </script>

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


    @section('js')

    <script type="text/javascript">
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();

            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                    console.log(results[0]);
                    var address = results[0].formatted_address;
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    $('#lat').val(latitude);
                    $('#lng').val(longitude);
                    $('#formAddress').val(address);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

    </script>

    @endsection