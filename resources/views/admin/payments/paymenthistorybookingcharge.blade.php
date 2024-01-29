@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Payments > Payment History</p>
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

                    <div class="btn-bar">
                        <ul class="nav nav-underline">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('admin.paymenthistory') }}">TopUp
                                    History
                                    View</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.paymenthistorybookingcharge') }}">Booking
                                    Charge View</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <!--    <div>
                                    <form action="{{ route('payment-history-usersearch') }}" method="GET" class="form-group">
                                       {{--  <h4>Payment History</h4> --}}
                                        <div class="find-student-sec-1">
                                        </div>
                                        <div class="find-student-sec-2">
                                            <input class="form-control" type="text" name="search" id="search-stu"
                                                placeholder="Receipt No:">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </form>

                                </div> -->

                        <div class="payment-his-tb">
                            <table id="example3" class="ui celled table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>RECEIPT</th>
                                        <th>NAME</th>
                                        <th>UNI.REG.NO.</th>
                                        <th>CHARGE AMOUNT</th>
                                        <th>REFUND AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($bookingcharges))
                                        @foreach ($bookingcharges as $bookingcharge)
                                            <tr>
                                                <td>{{ $bookingcharge->created_at }}</td>
                                                <td>{{ $bookingcharge->receipt }}</td>
                                                <td>{{ $bookingcharge->user->fname }} {{ $bookingcharge->user->lname }}</td>
                                                <td>{{ $bookingcharge->user->regno }}</td>
                                                <td>
                                                    @if ($bookingcharge->charge_amount == null)
                                                        <label> - </label>
                                                    @else
                                                         @if ($bookingcharge->status == 'KeyExtraCharge')
                                                            <label class="chargerdisplay"> LKR.
                                                                {{ $bookingcharge->charge_amount }} <i
                                                                    class="fa-solid fa-key fa-bounce fa-xs"
                                                                    style="color: #ff0000;"> Extra</i></label>
                                                        @else
                                                        <label class="chargerdisplay">LKR. {{ $bookingcharge->charge_amount }}</label>
                                                        @endif

                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($bookingcharge->refund_amount == null)
                                                        <label> - </label>
                                                    @else
                                                        <label class="refunddisplay">LKR. {{ $bookingcharge->refund_amount }}</label>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
