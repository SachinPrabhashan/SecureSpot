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

                    <div class="bkng-alert card-body">
                        <div class="alertbody">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert" id="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert" id="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                    <script>
                        $(document).ready(function() {

                            // Automatically hide the alert after 3 seconds
                            setTimeout(function() {
                                $(".alertbody").hide(400);
                            }, 5000);
                        });
                    </script>

                    <div class="book-his-tb">
                        <h5>Booking Manage</h5>
                        <table id="example3" class="ui celled table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Booked Date & Time</th>
                                    <th>Uni. Reg. No</th>
                                    <th>Student Name</th>
                                    <th>Date</th>
                                    <th>Starting at</th>
                                    <th>Ending at</th>
                                    <th>Locker</th>
                                    <th>Action</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->created_at }}</td>
                                        <td>{{ $booking->user->regno }}</td>
                                        <td>{{ $booking->user->fname }} {{ $booking->user->lname }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->start_time }}</td>
                                        <td>{{ $booking->end_time }}</td>
                                        <td>{{ $booking->locker->locker_type }}</td>
                                        <td class="action-td">
                                            @if ($booking->status == 'complete')
                                                <a href="#" data-bs-toggle=""
                                                    data-bs-target="#staticBackdrop{{ $booking->id }}"
                                                    style="visibility: hidden;"><i class="fa-solid fa-wrench fa-lg"
                                                        style="color: #198754;" title="Update Booking Status"></i></a>
                                            @else
                                                <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $booking->id }}"><i
                                                        class="fa-solid fa-wrench fa-lg" style="color: #198754;"
                                                        title="Update Booking Status"></i></a>
                                            @endif

                                            @if ($booking->status == 'approved')
                                                <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop2{{ $booking->id }}"><i
                                                        class="fa-solid fa-floppy-disk fa-lg ms-1" style="color: #e9b116;"
                                                        title="Complete Booking"></i></a>
                                            @elseif ($booking->key_management == 'no')
                                                <a href="" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop3{{ $booking->id }}"><i
                                                        class="fa-solid fa-user-lock fa-lg ms-1" style="color: #c20000;"
                                                        title="User Rescricted"></i></a>
                                            @endif

                                        </td>
                                        <td>
                                            @if ($booking->status == 'active')
                                                <label class="pending">Approval Pending <i
                                                        class="fa-solid fa-spinner fa-spin ms-1"></i></label>
                                            @elseif ($booking->status == 'approved')
                                                <label class="approve">Approved <i
                                                        class="fa-solid fa-check ms-1"></i></label>
                                            @elseif ($booking->status == 'reject')
                                                <label class="reject">Reject <i class="fa-solid fa-ban ms-1"></i></label>
                                            @elseif ($booking->status == 'processing')
                                                <label class="processing">Processing <i
                                                        class="fa-solid fa-gear fa-spin ms-1"></i></label>
                                            @elseif ($booking->status == 'complete')
                                                <label class="complete">Complete <i
                                                        class="fa-solid fa-circle-check ms-1"></i></label>
                                            @endif

                                            @if ($booking->key_management == 'no')
                                                <label for=""><i class="fa-solid fa-key fa-beat-fade"
                                                        style="color: #ff5900;"></i></label>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Booking Action Modal Form Here -->
                                    <div class="modal fade" id="staticBackdrop{{ $booking->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking Status :-
                                                        {{ $booking->id }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('updatestatus', $booking->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <select class="form-control" name="booking-status"
                                                            id="booking-status">
                                                            <option disabled>-- Select --</option>
                                                            <option value="approved">Approve</option>
                                                            <option value="reject">Reject</option>
                                                            <option value="processing">Processing</option>
                                                        </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Wait</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Key Return Confirm Modal -->
                                    <div class="modal fade" id="staticBackdrop3{{ $booking->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Unlock Users</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.keyreturnconfirm', $booking->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="key-return-confirm-modal">
                                                            <h4>Key Return?</h4>
                                                            <input type="radio" name="keyreturn" id="yes"
                                                                value="yes"><label for="yes">Yes</label>
                                                            <input class="ms-3" type="radio" name="keyreturn" id="no"
                                                                value="no"><label for="no">No</label>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Booking Complete Modal Form Here -->
                                    <div class="modal fade" id="staticBackdrop2{{ $booking->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Completing
                                                        Booking
                                                        :-
                                                        {{ $booking->id }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('completebooking', $booking->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div>
                                                            <label for="keyreturn">Locker Key Return : </label>
                                                            <br>
                                                            <input type="radio" name="keyreturn" id="keyreturn"
                                                                value="yes"> <label for="keyreturn">YES</label>
                                                            <input class="ms-5" type="radio" name="keyreturn"
                                                                id="keyreturn2" value="no"> <label
                                                                for="keyreturn2">NO</label>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <label for="">Are you going to complete the booking? </label>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection
