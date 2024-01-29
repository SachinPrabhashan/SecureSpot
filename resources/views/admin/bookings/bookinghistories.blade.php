@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Booking History</p>
                        </div>
                        <hr>
                    </div>

                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div> --}}

                    <div class="book-his-tb">
                        <h5>Booking History</h5>
                        <table id="example2" class="ui celled table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Booked Date & Time</th>
                                    <th>Date</th>
                                    <th>Starting at</th>
                                    <th>Ending at</th>
                                    <th>Locker</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>

                                        <td>{{ $booking->user_id }}</td>
                                        <td>{{ DB::table('users')->where('id', $booking->user_id)->value('fname') }}
                                            {{ DB::table('users')->where('id', $booking->user_id)->value('lname') }}
                                        </td>
                                        <td>{{ $booking->created_at }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->start_time }}</td>
                                        <td>{{ $booking->end_time }}</td>
                                        <td>{{ DB::table('lockers')->where('id', $booking->locker_id)->value('locker_type') }}
                                        </td>
                                        <td>
                                            @if ($booking->status == 'DeleteByUser')
                                                <label class="delete-status">Delete by Student</label>
                                            @elseif ($booking->status == 'ongoing' && $booking->bookings->status == 'active')
                                                <label class="ongoing-status">Ongoing <i
                                                        class="fa-solid fa-play fa-fade ms-1"></i></label>
                                                <label class="pending">Approvel Pending <i
                                                        class="fa-solid fa-spinner fa-spin ms-1"></i></label>
                                            @elseif ($booking->status == 'ongoing' && $booking->bookings->status == 'reject')
                                                <label class="ongoing-status">Ongoing <i
                                                        class="fa-solid fa-play fa-fade ms-1"></i></label>
                                                <label class="reject">Reject <i class="fa-solid fa-ban ms-1"></i></label>
                                            @elseif ($booking->status == 'ongoing' && $booking->bookings->status == 'approved')
                                                <label class="ongoing-status">Ongoing <i
                                                        class="fa-solid fa-play fa-fade ms-1"></i></label>
                                                <label class="approve">Approved <i
                                                        class="fa-solid fa-check ms-1"></i></label>
                                            @elseif ($booking->status == 'ongoing' && $booking->bookings->status == 'processing')
                                                <label class="ongoing-status">Ongoing <i
                                                        class="fa-solid fa-play fa-fade ms-1"></i></label>
                                                <label class="processing">Processing <i
                                                        class="fa-solid fa-gear fa-spin ms-1"></i></label>
                                            @elseif ($booking->status == 'RejectByAdmin')
                                                <label class="reject">Reject <i class="fa-solid fa-ban ms-1"></i></label>
                                            @elseif ($booking->status == 'complete')
                                                <label class="complete">Complete <i
                                                        class="fa-solid fa-circle-check ms-1"></i></label>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
