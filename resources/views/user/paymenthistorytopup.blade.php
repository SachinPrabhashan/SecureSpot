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
                                    <a class="nav-link " aria-current="page"
                                        href="{{ route('user.paymenthistory') }}">Booking Charge View</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('user.paymenthistorytopup') }}">TopUp History
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
                                        <th>AMOUNT</th>
                                        <th>PAY BY</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments_topups as $payments_topup)
                                        @if ($payments_topup->user_id == Auth::user()->id)
                                            <tr>
                                                <td>{{ $payments_topup->created_at }}</td>
                                                <td>{{ $payments_topup->receipt }}</td>
                                                <td>{{ $payments_topup->amount }}</td>
                                                <td>
                                                    @if ($payments_topup->payment_method == 'cash')
                                                        <label style="color: #0d9b48;"><i
                                                                class="fa-solid fa-sack-dollar"></i> Cash</label>
                                                    @endif
                                                </td>
                                                <td>{{ $payments_topup->amount }}</td>
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
