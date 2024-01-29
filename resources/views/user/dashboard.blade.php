@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card ">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body user-dash-view">
                        <div class="">


                            <!-- Your HTML content here -->
                            <div ng-controller="ClockController">
                                <div class="clock-digital">
                                    <div id="clock">@{{ currentTime | date: 'HH:mm' }}</div>
                                </div>
                            </div>


                            <div class="acc-bal-dis">
                                <label for="">Account Balance LKR: {{ Auth::user()->credit }}</label>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- For Real Clock Display --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateLabelContent() {
                var realTimeData = new Date().toLocaleTimeString();
                $('.s label').text(realTimeData);
            }
            setInterval(updateLabelContent, 1000);
        });
    </script> --}}

    {{-- AngularJS --}}
    <!-- Include AngularJS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script>
        angular.module('clockApp', [])
            .controller('ClockController', function($scope, $interval, $filter) {
                // Update the current time every second
                $interval(function() {
                      $scope.currentTime = $filter('date')(new Date(), 'HH:mm');
                }, 1000);
            });
    </script>
@endsection
