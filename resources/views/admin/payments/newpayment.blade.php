@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Payments > New Payment</p>
                        </div>
                        <hr>
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

                    <div>
                        <div>
                            <form action="{{ route('admin.paymentusersearch') }}" method="GET" class="form-group">
                                <h4>Make New Payment</h4>
                                <div class="find-student-sec-1">
                                    <label for="search-stu">Find Student :</label>
                                </div>
                                <div class="find-student-sec-2">
                                    <input class="form-control" type="text" name="search" id="search-stu"
                                        placeholder="Enter name">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="payment-user-tb">
                        <table id="" class="ui celled table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Faculty</th>
                                    <th>Uni. Reg. No</th>
                                    <th>Credit Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($results))
                                    @foreach ($results as $result)
                                        @if ($result['role_id'] === 2)
                                            <tr>
                                                <td>{{ $result->fname }}</td>
                                                <td>{{ $result->lname }}</td>
                                                <td>{{ $result->faculty }}</td>
                                                <td>{{ $result->regno }}</td>
                                                <td>LKR. {{ $result->credit }} <a
                                                        href="{{ route('paymentproceed', $result->id) }}"
                                                        title="TopUp Now"><i class="fa-solid fa-circle-dollar-to-slot ms-3"
                                                            style="color: #198754"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
