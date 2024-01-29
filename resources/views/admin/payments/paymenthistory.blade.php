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
                                <a class="nav-link active" aria-current="page" href="{{ route('admin.paymenthistory') }}">TopUp History
                                    View</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.paymenthistorybookingcharge') }}">Booking Charge View</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="payment-his-tb">
                            <table id="example3" class="ui celled table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>RECEIPT</th>
                                        <th>NAME</th>
                                        <th>UNI.REG.NO.</th>
                                        <th>AMOUNT</th>
                                        <th>PAYMENT BY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($topupcharges))
                                        @foreach ($topupcharges as $topupcharge)
                                            <tr>
                                                <td>{{ $topupcharge->created_at }}</td>
                                                <td>{{ $topupcharge->receipt }}</td>
                                                <td>{{ $topupcharge->user->fname }}</td>
                                                <td>{{ $topupcharge->user->regno }}</td>
                                                <td>LKR. {{ $topupcharge->amount }}</td>
                                                <td>
                                                    @if ($topupcharge->payment_method == 'cash')
                                                        <label style="color: #0d9b48;"><i
                                                                class="fa-solid fa-sack-dollar"></i> Cash</label>
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
