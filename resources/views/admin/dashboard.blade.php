@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-md-12">
                <div class="dash-card card">
                    {{-- <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Dashboard</p>
                        </div>
                        <hr>
                    </div> --}}

                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div> --}}

                    <div class="dash-summary-icon">
                        <div class="dash-item-1-user">
                            <label for="">{{ Auth::user()->count() }} Users</label>
                        </div>
                        <div class="dash-item-2-locker">
                            <label for="">{{ DB::table('lockers')->count() }} Lockers </label>
                        </div>
                        <div class="dash-item-3">
                            <label for="">{{ DB::table('bookings')->count() }} Ongoing<br>Booking </label>
                        </div>
                    </div>
                    <div class="dash-summary-icon">
                        <div class="dash-item-4-allbook">
                            <label for="">{{ DB::table('booking_histories')->count() }} Life Time Bookings </label>
                        </div>

                    </div>
                    {{-- <div class="dash-summary-icon">
                        <div class="card" style="width: 18rem;">
                            <div class="dash-item card-body">
                                <h5 class="card-title"><i class="fa-solid fa-users"></i> Users : </h5>
                                <h5 class="ms-4">{{ Auth::user()->count() }}</h5>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="dash-item card-body">
                                <h5 class="card-title"><i class="fa-solid fa-boxes-stacked"></i> Lockers : </h5>
                                <h5 class="ms-4">{{ DB::table('lockers')->count() }}</h5>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="dash-item card-body">
                                <h5 class="card-title"><i class="fa-solid fa-square-check"></i> Ongoing Bookings : </h5>
                                <h5 class="ms-4">{{ DB::table('bookings')->count() }}</h5>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="dash-summary-icon">
                        <div class="card" style="width: 18rem;">
                            <div class="dash-item card-body">
                                <h5 class="card-title"><i class="fa-solid fa-message"></i> User Messages : </h5>
                                <h5 class="ms-4">{{ DB::table('contacts')->count() }}</h5>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="dash-item card-body">
                                <h5 class="card-title"><i class="fa-solid fa-earth-americas"></i> Life Time Bookings : </h5>
                                <h5 class="ms-4">{{ DB::table('booking_histories')->count() }}</h5>
                            </div>
                        </div>
                    </div> --}}




                </div>
            </div>
        </div>
    </div>
@endsection
