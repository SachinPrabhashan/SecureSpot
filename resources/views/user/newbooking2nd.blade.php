@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bookingframe1 col-md-12">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Book New Locker') }}</div> --}}
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Booking > Book New Locker</p>
                        </div>
                        <div class="acc-bal">
                            <p>Account Balance :<b> LKR {{ Auth::user()->credit }}
                                    @if (Auth::user()->credit <= 10)
                                        <i class="fa-solid fa-circle-exclamation fa-beat-fade" title="Low Credit!!!"
                                            style="color: #ff0000;"></i>
                                    @endif
                                </b></p>
                        </div>
                    </div>

                    <div class="bkng-alert card-body">
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


                    <form method="POST" action="{{ route('user.bookingcreate') }}" id="bookingform">
                        @csrf
                        <div class="date-time-select-2 form-group">
                            <div>
                                <h5>Date: {{ session('date') }}</h5>
                                <input type="text" name="date" id="date" value="{{ session('date') }}"
                                    placeholder="{{ session('date') }}" hidden required>
                            </div>
                            <div>
                                <h5>From: {{ session('start_time') }}</h5>
                                <input type="text" name="start_time" id="start_time" value="{{ session('start_time') }}"
                                    placeholder="{{ session('start_time') }}" hidden required>
                            </div>
                            <div>
                                <h5>To: {{ session('end_time') }}</h5>
                                <input type="text" name="end_time" id="end_time" value="{{ session('end_time') }}"
                                    placeholder="{{ session('end_time') }}" hidden required>
                            </div>
                        </div>
                        <div class="locker-sec">
                            <label>Select Locker:</label>
                            <div class="locker-area">
                                <div class="select-locker">
                                    @if (isset($lockers))
                                        @php
                                            $lockersChunks = $lockers->chunk(5);
                                        @endphp
                                        @foreach ($lockersChunks as $col)
                                            <div class="lockers">
                                                @foreach ($col as $locker)
                                                    <div class="locker-item" role="button">
                                                        <div class="locker">

                                                            {{-- {{dd($bookedlocker)}} --}}
                                                            @if ($locker->id === $bookedlocker)
                                                                <input name="selected_locker"
                                                                    id="{{ $locker->locker_type }}" type="checkbox"
                                                                    class="locker-checkbox" value="{{ $locker->id }}"
                                                                    onclick="validateCheckboxes()" disabled>
                                                                <label title="Booked" class="booked" data-toggle="tooltip"
                                                                    for="{{ $locker->locker_type }}">
                                                                    <span><i class="fa-solid fa-vault ms-0"></i>
                                                                        {{ $locker->locker_type }}</span>
                                                                </label>
                                                            @elseif ($locker->status === 'Disable')
                                                                <input name="selected_locker"
                                                                    id="{{ $locker->locker_type }}" type="checkbox"
                                                                    class="locker-checkbox" value="{{ $locker->id }}"
                                                                    onclick="validateCheckboxes()" disabled>
                                                                <label title="Under Repair" class="disable"
                                                                    data-toggle="tooltip" for="{{ $locker->locker_type }}">
                                                                    <span><i class="fa-solid fa-vault ms-0"></i>
                                                                        {{ $locker->locker_type }}</span>
                                                                </label>
                                                            @else
                                                                <input name="selected_locker"
                                                                    id="{{ $locker->locker_type }}" type="checkbox"
                                                                    class="locker-checkbox" value="{{ $locker->id }}"
                                                                    onclick="validateCheckboxes()">

                                                                <label title="Available" data-toggle="tooltip"
                                                                    for="{{ $locker->locker_type }}">
                                                                    <span><i class="fa-solid fa-vault ms-0"></i>
                                                                        {{ $locker->locker_type }}</span>
                                                                </label>
                                                            @endif

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="submit-btn">
                            <button id="submitBtn" type="submit" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" disabled>
                                Proceed
                            </button>
                            <button type="reset" class=" clearbtn btn btn-danger">Clear</button>
                        </div>
                    </form>
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
                if (checkedCheckboxes.length >= 1) {
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
