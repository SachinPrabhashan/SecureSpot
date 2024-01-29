@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Feedback > User Reviews</p>
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

                    <div class="review-tb-area">
                        <h5>User Reviews</h5>
                        <div>

                            <table id="example3" class="ui celled table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Reference No</th>
                                        <th>Locker Name</th>
                                        <th>User Name</th>
                                        <th>Rate</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $review->created_at }}</td>
                                            <td>{{ $review->BookingHistory->reference_no }}</td>
                                            <td>{{ $review->locker->locker_type }}</td>
                                            <td>{{ $review->user->fname }} {{ $review->user->lname }}</td>
                                            <td>{{ $review->rate }}/5</td>
                                            <td>{{ $review->user_review }}</td>
                                            <td>
                                                @if ($review->view_status == 'unread')
                                                    <label class="review-unread">New <i id="reviewbtn"
                                                            class="fa-solid fa-file-pen ms-1"></i></label>
                                                @elseif ($review->view_status == 'read')
                                                    <label class="review-read">Checked <i id="reviewbtn"
                                                            class="fa-solid fa-file-pen ms-1"></i></label>
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
    </div>
@endsection
