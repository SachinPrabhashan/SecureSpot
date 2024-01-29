@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Payments > Payment History</p>
                        </div>
                    </div>

                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div> --}}

                    <div>
                        {{-- <form action="" class="form-group">
                            <div class="select-payment-date">
                                <div>
                                    <label for="fromdate">From :</label>
                                    <input class="form-control" type="date" id="fromdate">
                                </div>
                                <div>
                                    <label for="todate">To :</label>
                                    <input class="form-control" type="date" id="todate">
                                </div>
                            </div>
                        </form> --}}
                        <div class="btn-bar">
                            <ul class="nav nav-underline">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"
                                        href="{{ route('user.paymenthistory') }}">Booking Charge View</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.paymenthistorytopup') }}">TopUp History
                                        View</a>
                                </li>
                            </ul>
                        </div>
                        <div class="book-pay-his-tb">

                            <table id="example4" class="ui celled table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>RECEIPT NO</th>
                                        <th>LOCKER</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments_bookings as $payments_booking)
                                        @if ($payments_booking->bookingshistory->user_id == Auth::user()->id)
                                            <tr>
                                                <td>{{ $payments_booking->created_at }}</td>
                                                <td>{{ $payments_booking->receipt }}</td>
                                                <td>{{ $payments_booking->bookingshistory->locker_id }}</td>
                                                <td>
                                                    @if ($payments_booking->charge_amount == null)
                                                        <label class="refunddisplay">+ LKR.
                                                            {{ $payments_booking->refund_amount }}</label>
                                                    @elseif ($payments_booking->refund_amount == null)
                                                        @if ($payments_booking->status == 'KeyExtraCharge')
                                                            <label class="chargerdisplay">- LKR.
                                                                {{ $payments_booking->charge_amount }} <i
                                                                    class="fa-solid fa-key fa-bounce fa-xs"
                                                                    style="color: #ff0000;"> Extra</i></label>
                                                        @else
                                                            <label class="chargerdisplay">- LKR.
                                                                {{ $payments_booking->charge_amount }}</label>
                                                        @endif
                                                    @endif
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
    </div>
@endsection
