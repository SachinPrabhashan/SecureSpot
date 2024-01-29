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

                    <div class="payment-area">
                            <h4>Top Up User Account</h4>
                            <label for="paymentmethod">Select Payment Method</label>
                            <div class="fc">
                                <div class="form-check fc1 ">
                                    <input class="form-check-input rdbtn" type="radio" name="payment-method"
                                        id="payment-method1" value="option1" checked>
                                    <label class="form-check-label select-cash" for="payment-method1">
                                        Cash <img src="{{ asset('image/money-svgrepo-com.svg') }}" alt=""
                                            width="50px">
                                    </label>
                                </div>
                                <div class="form-check fc2 ">
                                    <input class="form-check-input rdbtn" type="radio" name="payment-method"
                                        id="payment-method2" value="option2">
                                    <label class="form-check-label select-card" for="payment-method2">
                                        Card <img src="{{ asset('image/visa-svgrepo-com.svg') }}" alt=""
                                            width="50px">
                                    </label>
                                </div>
                            </div>

                            {{-- @foreach ($users as $user) --}}
                            <div class="paycash-area ">
                                <form action="{{ route('admin.NewTopup', $users->id ) }}" method="POST" class="form-group">
                                    @csrf
                                    <div class="">
                                        <h6 for="">Cash Amount</h6>
                                        <input class="form-control" id="cashpayment" name="cashpayment" type="number" placeholder="LKR: ">
                                    </div>
                                    <div class="d-flex gap-2 justify-content-center mt-3">
                                        <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">Confirm
                                            Payment</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            {{-- @endforeach --}}
                        <div class="paycard-area ">
                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Card Owner</h6>
                                            </label>
                                            <input type="text" name="username" placeholder="Card Owner Name" required
                                                class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group">
                                                <input type="text" name="cardNumber" placeholder="Valid card number"
                                                    class="form-control" required />
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-muted"> <i
                                                            class="fab fa-cc-visa mx-1"></i> <i
                                                            class="fab fa-cc-mastercard mx-1"></i> <i
                                                            class="fab fa-cc-amex mx-1"></i> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label>
                                                        <span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span>
                                                    </label>
                                                    <div class="input-group"><input type="number" placeholder="MM"
                                                            name="" class="form-control" required /> <input
                                                            type="number" placeholder="YY" name=""
                                                            class="form-control" required /></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label data-toggle="tooltip"
                                                        title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label>
                                                    <input type="text" required class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <button type="button"
                                                class="subscribe btn btn-primary btn-block shadow-sm">Confirm
                                                Payment</button>
                                            <button type="reset" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bootstrap JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

        {{--     JQuery Library --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $('.select-cash').on('click', function() {
                $('.paycard-area').removeClass("show");
                $('.paycash-area').toggleClass("show");
            });

            $('.select-card').on('click', function() {
                $('.paycash-area').removeClass("show");
                $('.paycard-area').toggleClass("show");
            });
        </script>
    @endsection
