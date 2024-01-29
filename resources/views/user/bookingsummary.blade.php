@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Book New Locker') }}</div> --}}
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Booking > Booking Summary
                            </p>
                        </div>
                        <hr>
                        <div class="acc-bal">
                            <p>Account Balance :<b> LKR {{ Auth::user()->credit }}</b></p>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="book-sum-tb">
                        <table>
                            <tr>
                                <th>Reference No: </th>
                                <td>{{ $date = DB::table('bookings')->where('user_id', '=', Auth::user()->id)->where(
                                        'created_at',
                                        '=',
                                        DB::table('bookings')->where('user_id', '=', Auth::user()->id)->max('created_at'),
                                    )->value('reference_no') }}
                                </td>
                            </tr>

                            <tr>
                                <th>Date: </th>
                                <td>{{ $date = DB::table('bookings')->where('user_id', '=', Auth::user()->id)->where(
                                        'created_at',
                                        '=',
                                        DB::table('bookings')->where('user_id', '=', Auth::user()->id)->max('created_at'),
                                    )->value('date') }}
                                </td>
                            </tr>

                            <tr>
                                <th>Starting at: </th>
                                <td>{{ $start = DB::table('bookings')->where('user_id', '=', Auth::user()->id)->where(
                                        'created_at',
                                        '=',
                                        DB::table('bookings')->where('user_id', '=', Auth::user()->id)->max('created_at'),
                                    )->value('start_time') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Ending at: </th>
                                <td>{{ $end = DB::table('bookings')->where('user_id', '=', Auth::user()->id)->where(
                                        'created_at',
                                        '=',
                                        DB::table('bookings')->where('user_id', '=', Auth::user()->id)->max('created_at'),
                                    )->value('end_time') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Locker: </th>
                                <td>@php
                                    $lockerId = DB::table('bookings')
                                        ->where('user_id', '=', Auth::user()->id)
                                        ->where(
                                            'created_at',
                                            '=',
                                            DB::table('bookings')
                                                ->where('user_id', '=', Auth::user()->id)
                                                ->max('created_at'),
                                        )
                                        ->value('locker_id');

                                    $lockerName = DB::table('lockers')
                                        ->where('id', '=', $lockerId)
                                        ->value('locker_type');
                                @endphp
                                    {{ $lockerName }}
                                </td>
                            </tr>
                            <tr>
                                <th>Booking Charge: </th>
                                <td>
                                    @php
                                        $unitprice = (int) DB::table('lockers_settings')->value('unitprice');

                                        $unitcount = (int) DB::table('bookings')
                                            ->where(
                                                'created_at',
                                                '=',
                                                DB::table('bookings')
                                                    ->where('user_id', '=', Auth::user()->id)
                                                    ->max('created_at'),
                                            )
                                            ->value('usage');

                                        /* dd($unitprice , $unitcount); */
                                        $estimatebookingfee = $unitprice * $unitcount;
                                    @endphp
                                    LKR. {{ $estimatebookingfee }}
                                </td>
                            </tr>
                            <tr>
                                <th>Payment Receipt: </th>
                                <td>
                                    @php
                                        $paymentreceipt = DB::table('payments_bookings')
                                            ->where(
                                                'created_at',
                                                '=',
                                                DB::table('booking_histories')
                                                    ->where('user_id', '=', Auth::user()->id)
                                                    ->max('created_at'),
                                            )
                                            ->value('receipt');
                                        /* dd($paymentreceipt); */
                                    @endphp
                                    {{ $paymentreceipt }}
                                </td>
                            </tr>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <script>
        //dynamically update the options in the ending time field based on the selected starting time

        function updateEndTime() {
            var startTimeSelect = document.getElementById("start_time");
            var endTimeSelect = document.getElementById("end_time");
            var selectedStartTime = startTimeSelect.value;

            // Enable all options in endTimeSelect
            for (var i = 0; i < endTimeSelect.options.length; i++) {
                endTimeSelect.options[i].disabled = false;
            }

            // Disable options that are earlier than selectedStartTime
            for (var i = 0; i < endTimeSelect.options.length; i++) {
                var endTime = endTimeSelect.options[i].value;
                if (endTime <= selectedStartTime) {
                    endTimeSelect.options[i].disabled = true;
                }
            }
        }
    </script>

    <script>
        // Diable earlier date being selected by user
        document.getElementById('date').min = new Date().toISOString().split('T')[0];
    </script>

    <script>
        // Get all checkboxes
        const checkboxes = document.querySelectorAll('.locker-checkbox');

        // Add event listener to each checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // Get the number of checked checkboxes
                const checkedCheckboxes = document.querySelectorAll('.locker-checkbox:checked');

                // Disable the remaining checkboxes if two are checked
                if (checkedCheckboxes.length >= 2) {
                    checkboxes.forEach(cb => {
                        if (!cb.checked) {
                            cb.disabled = true;
                        }
                    });
                } else {
                    // Enable all checkboxes if less than two are checked
                    checkboxes.forEach(cb => {
                        cb.disabled = false;
                    });
                }
            });
        });
    </script>

    <script>
        // Function to validate checkboxes
        function validateCheckboxes() {
            // Get all checkboxes with class 'checkbox'
            var checkboxes = document.querySelectorAll('.locker-checkbox');

            // Get the button
            var submitBtn = document.getElementById('submitBtn');

            // Check if at least one checkbox is checked
            var atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

            // Enable or disable the button based on the validation result
            submitBtn.disabled = !atLeastOneChecked;
        }
    </script>
@endsection
