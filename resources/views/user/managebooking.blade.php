@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Booking > Manage Bookings</p>
                        </div>
                    </div>

                    <div class=" card-body ">
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


                    <div class="booking-detail-tb">
                        <label>My Bookings</label>
                        <table id="example" class="ui celled table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Booked Date & Time</th>
                                    <th>Date</th>
                                    <th>Starting at</th>
                                    <th>Ending at</th>
                                    <th>Locker</th>
                                    <th>Est. Charge</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    @if ($booking->user_id === Auth::user()->id)
                                        <tr>
                                            <td>{{ $booking->created_at }}</td>
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->start_time }}</td>
                                            <td>{{ $booking->end_time }}</td>
                                            <td>{{ $booking->locker_id }}</td>
                                            <td>@php
                                                $unitprice = (int) DB::table('lockers_settings')->value('unitprice');

                                                $unitcount = (int) DB::table('bookings')
                                                    ->where('id', '=', $booking->id)
                                                    ->value('usage');

                                                $estimatebookingfee = $unitprice * $unitcount;
                                            @endphp
                                                LKR. {{ $estimatebookingfee }}</td>
                                            <td>

                                                {{-- <a href="{{ route('user.editbooking', $booking->id) }}"><i
                                                        class="fa-solid fa-pen-to-square" style="color: #3dad00;"></i></a> --}}
                                                @if ($booking->status == 'approved')
                                                    <a class="del" onclick="return confirm('Are you want to delete?');"
                                                        href=""></a><i class="fa-solid fa-trash"
                                                        style="color: #a0a0a0;" title="Delete N/A"></i>
                                                @elseif ($booking->status == 'reject')
                                                    <a class="del" onclick="return confirm('Are you want to delete?');"
                                                        href="{{ route('user.deletebooking', $booking->id) }}"><i
                                                            class="fa-solid fa-trash" style="color: #ff2929;"
                                                            title="Delete"></i></a>
                                                @elseif ($booking->status == 'active')
                                                    <a class="del" onclick="return confirm('Are you want to delete?');"
                                                        href="{{ route('user.deletebooking', $booking->id) }}"><i
                                                            class="fa-solid fa-trash" style="color: #ff2929;"
                                                            title="Delete"></i></a>
                                                @elseif ($booking->status == 'processing')
                                                    <a class="del" onclick="return confirm('Are you want to delete?');"
                                                        href="{{ route('user.deletebooking', $booking->id) }}"><i
                                                            class="fa-solid fa-trash" style="color: #ff2929;"
                                                            title="Delete"></i></a>
                                                @elseif ($booking->status == 'complete' && $booking->key_management == 'yes' )
                                                    <label class="review" for="reviewbtn" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop">Review<i id="reviewbtn"
                                                            class="fa-solid fa-file-pen ms-1"></i></label>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($booking->status == 'active')
                                                    <label class="pending">Admin Approval Pending <i
                                                            class="fa-solid fa-spinner fa-spin ms-1"></i></label>
                                                @elseif ($booking->status == 'approved')
                                                    <label class="approve">Approved <i
                                                            class="fa-solid fa-check ms-1"></i></label>
                                                @elseif ($booking->status == 'reject')
                                                    <label class="reject">Reject <i
                                                            class="fa-solid fa-ban ms-1"></i></label>
                                                @elseif ($booking->status == 'processing')
                                                    <label class="processing">Processing <i
                                                            class="fa-solid fa-gear fa-spin ms-1"></i></label>
                                                @elseif ($booking->status == 'complete')
                                                    <label class="complete">Complete <i
                                                            class="fa-solid fa-circle-check ms-1"></i></label>
                                                @endif

                                                @if ($booking->key_management == 'no')
                                                    <label for=""><i class="fa-solid fa-key fa-beat-fade fa-lg"
                                                            style="color: #ff0000;" title="Return Your Key"></i></label>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif




                                    <!-- Review Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Review Bookings
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('reviewpost', $booking->id ) }}" method="post">
                                                        @csrf
                                                        <div class="review-modal">

                                                            <label class="rate-topic" for="">Rate Locker:</label>
                                                            <div>
                                                                <div class="rate">
                                                                    <input type="radio" id="star5" name="rate"
                                                                        value="5" />
                                                                    <label for="star5" title="text">5 stars</label>
                                                                    <input type="radio" id="star4" name="rate"
                                                                        value="4" />
                                                                    <label for="star4" title="text">4 stars</label>
                                                                    <input type="radio" id="star3" name="rate"
                                                                        value="3" />
                                                                    <label for="star3" title="text">3 stars</label>
                                                                    <input type="radio" id="star2" name="rate"
                                                                        value="2" />
                                                                    <label for="star2" title="text">2 stars</label>
                                                                    <input type="radio" id="star1" name="rate"
                                                                        value="1" />
                                                                    <label for="star1" title="text">1 star</label>
                                                                </div>
                                                            </div>

                                                            <label for="">
                                                                <hr>
                                                                Write your thought here:
                                                                <textarea class="form-control" name="review-text" id="review-text" cols="50" rows="7" maxlength="255" required></textarea>
                                                            </label>
                                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Wait</button>
                                                    <button type="submit" class="btn btn-primary">Post</button>
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
