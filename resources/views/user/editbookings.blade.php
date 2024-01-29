@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Book New Locker') }}</div> --}}
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Booking > Manage Bookings > Edit</p>
                        </div>
                        {{-- <div class="acc-bal">
                            <p>Account Balance :<b> LKR {{ Auth::user()->credit }}</b></p>
                        </div> --}}
                    </div>

                    <div class="card-body">
                        <div class="alertbody">
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


                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                        <script>
                            $(document).ready(function() {

                                // Automatically hide the alert after 3 seconds
                                setTimeout(function() {
                                    $(".alertbody").hide(400);
                                }, 5000);
                            });
                        </script>

                    </div>
                    {{-- {{ dd($bookings)}} --}}
                    @foreach ($bookings as $booking)


                    <form method="POST" action="{{ route('user.bookingcreate') }}" id="bookingform">
                        @csrf
                        <div class="date-time-select form-group">
                            <div class="date-div">
                                <label for="date">Date:</label>
                                <input class="form-control" type="date" name="date" id="date" required>
                            </div>

                            <div class="time-div">
                                <div class="start-time">
                                    <label for="start_time">Starting at: </label>
                                    <select class="form-control" name="start_time" id="start_time"
                                        onchange="updateEndTime()">
                                        <option value="08:00" {{ $booking->start_time === '08:00' ? 'selected' : '' }} >8:00 AM</option>
                                        <option value="08:30" {{ $booking->start_time === '08:30' ? 'selected' : '' }} >8:30 AM</option>
                                        <option value="09:00" {{ $booking->start_time === '09:00' ? 'selected' : '' }} >9:00 AM</option>
                                        <option value="09:30" {{ $booking->start_time === '09:30' ? 'selected' : '' }} >9:30 AM</option>
                                        <option value="10:00" {{ $booking->start_time === '10:00' ? 'selected' : '' }} >10:00 AM</option>
                                        <option value="10:30">10:30 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="11:30">11:30 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="12:30">12:30 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="13:30">1:30 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="14:30">2:30 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="15:30">3:30 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="16:30">4:30 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                        <option value="17:30">5:30 PM</option>
                                    </select>
                                </div>
                                <div class="end-time">
                                    <label for="end_time">Ending at: </label>
                                    <select class="form-control" name="end_time" id="end_time" required>
                                        <option value="08:30">8:30 AM</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="09:30">9:30 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="10:30">10:30 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="11:30">11:30 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="12:30">12:30 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="13:30">1:30 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="14:30">2:30 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="15:30">3:30 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="16:30">4:30 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                        <option value="17:30">5:30 PM</option>
                                        <option value="18:00">6:00 PM</option>
                                    </select>
                                </div>
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
                                                        {{-- @if ($locker->status === 'booked')
                                                            <input name="selected_locker" id="{{ $locker->locker_type }}"
                                                                type="checkbox" class="locker-checkbox"
                                                                value="{{ $locker->id }}"
                                                                data-date="{{ $selectedDate }}"
                                                                data-start-time="{{ $selectedStartTime }}"
                                                                data-end-time="{{ $selectedEndTime }}"
                                                                onclick="validateCheckboxes()" disabled>
                                                            <label class="booked" data-toggle="tooltip"
                                                                for="{{ $locker->locker_type }}">
                                                                <span><i class="fa-solid fa-vault ms-0"></i>
                                                                    {{ $locker->locker_type }}</span>
                                                            </label>

                                                        @elseif ($locker->status === 'Disable')
                                                            <input name="selected_locker" id="{{ $locker->locker_type }}"
                                                                type="checkbox" class="locker-checkbox"
                                                                value="{{ $locker->id }}" onclick="validateCheckboxes()"
                                                                disabled>
                                                            <label class="disable" data-toggle="tooltip"
                                                                for="{{ $locker->locker_type }}">
                                                                <span><i class="fa-solid fa-vault ms-0"></i>
                                                                    {{ $locker->locker_type }}</span>
                                                            </label>
                                                        @else --}}
                                                            <input name="selected_locker" id="{{ $locker->locker_type }}"
                                                                type="checkbox" class="locker-checkbox"
                                                                value="{{ $locker->id }}"
                                                                onclick="validateCheckboxes()">

                                                            <label data-toggle="tooltip"
                                                                for="{{ $locker->locker_type }}">
                                                                <span><i class="fa-solid fa-vault ms-0"></i>
                                                                    {{ $locker->locker_type }}</span>
                                                            </label>
                                                        {{-- @endif --}}
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
                                Update
                            </button>
                            <a href="{{ route('user.managebooking') }}"><button class="clearbtn btn btn-danger">Close</button></a>
                        </div>

                    </form>

                    @endforeach

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
