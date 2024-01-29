@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Booking > Booking History</p>
                        </div>
                    </div>

                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div> --}}

                    <div class="book-his-tb">
                        <h5>My History</h5>
                        <table id="example4" class="ui celled table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Booked Date & Time</th>
                                    <th>Date</th>
                                    <th>Starting at</th>
                                    <th>Ending at</th>
                                    <th>Locker</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookinghistorys as $bookinghistory)
                                    @if ($bookinghistory->user_id === Auth::user()->id)
                                        <tr>
                                            <td>{{ $bookinghistory->created_at }}</td>
                                            <td>{{ $bookinghistory->date }}</td>
                                            <td>{{ $bookinghistory->start_time }}</td>
                                            <td>{{ $bookinghistory->end_time }}</td>
                                            <td>{{ $bookinghistory->locker_id }}</td>
                                            <td>
                                                @if ($bookinghistory->status == 'DeleteByUser')
                                                    <label class="delete-status">Delete by Me</label>
                                                @elseif ($bookinghistory->status == 'ongoing' && $bookinghistory->bookings->status == 'active')
                                                    <label class="ongoing-status">Ongoing <i
                                                            class="fa-solid fa-play fa-fade ms-1"></i></label>
                                                    <label class="pending">Approvel Pending <i
                                                            class="fa-solid fa-spinner fa-spin ms-1"></i></label>
                                                @elseif ($bookinghistory->status == 'ongoing' && $bookinghistory->bookings->status == 'approved')
                                                    <label class="ongoing-status">Ongoing <i
                                                            class="fa-solid fa-play fa-fade ms-1"></i></label>
                                                    <label class="approve">Approved <i
                                                            class="fa-solid fa-check ms-1"></i></label>
                                                @elseif ($bookinghistory->status == 'ongoing' && $bookinghistory->bookings->status == 'processing')
                                                    <label class="ongoing-status">Ongoing <i
                                                            class="fa-solid fa-play fa-fade ms-1"></i> </label>
                                                    <label class="processing">Processing <i
                                                            class="fa-solid fa-gear fa-spin ms-1"></i></label>
                                                @elseif ($bookinghistory->status == 'ongoing' && $bookinghistory->bookings->status == 'reject')
                                                    <label class="ongoing-status">Ongoing <i
                                                            class="fa-solid fa-play fa-fade ms-1"></i> </label>
                                                    <label class="reject">Rejected <i
                                                        class="fa-solid fa-ban ms-1"></i></i></label>
                                                @elseif ($bookinghistory->status == 'RejectByAdmin')
                                                    <label class="reject">Rejected <i
                                                            class="fa-solid fa-ban ms-1"></i></label>
                                                @elseif ($bookinghistory->status == 'complete')
                                                    <label class="complete">Complete <i
                                                            class="fa-solid fa-circle-check ms-1"></i></label>
                                                @endif

                                                {{-- If Reviewed Display the Ratings --}}
                                                {{-- @foreach ($rate_stars as $rate_star)
                                                    @if ($rate_star->rate == 1 && $bookinghistory->status == 'complete')
                                                        <label class="rate-stars">
                                                            <i class="fa-solid fa-star"></i><i
                                                                class="fa-regular fa-star"></i><i
                                                                class="fa-regular fa-star"></i><i
                                                                class="fa-regular fa-star"></i><i
                                                                class="fa-regular fa-star"></i>
                                                        </label>
                                                    @elseif ($rate_star->rate == 2 && $bookinghistory->status == 'complete')
                                                        <label class="rate-stars">
                                                            <i class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-regular fa-star"></i><i
                                                                class="fa-regular fa-star"></i><i
                                                                class="fa-regular fa-star"></i>
                                                        </label>
                                                    @elseif ($rate_star->rate == 3 && $bookinghistory->status == 'complete')
                                                        <label class="rate-stars">
                                                            <i class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-regular fa-star"></i><i
                                                                class="fa-regular fa-star"></i>
                                                        </label>
                                                    @elseif ($rate_star->rate == 4 && $bookinghistory->status == 'complete')
                                                        <label class="rate-stars">
                                                            <i class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-regular fa-star"></i>
                                                        </label>
                                                    @elseif ($rate_star->rate == 5 && $bookinghistory->status == 'complete')
                                                        <label class="rate-stars">
                                                            <i class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i><i
                                                                class="fa-solid fa-star"></i>
                                                        </label>
                                                    @elseif ($rate_star->rate == null && $bookinghistory->status == 'complete')
                                                    @endif
                                                @endforeach --}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
