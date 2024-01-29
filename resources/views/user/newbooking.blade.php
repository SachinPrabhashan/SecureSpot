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

                    {{-- <div class="card-body ">
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
                    </script> --}}
                    @if ($key_manage == 'no')
                        <div style="opacity: 50%">
                            <form method="POST" action="" id="bookingform">
                                @csrf
                                <div class="date-time-select form-group" style="margin-top:30px;">
                                    <div class="date-div">
                                        <label for="date">Date:</label>
                                        <input class="form-control" type="date" name="date" id="date" required
                                            disabled>
                                    </div>

                                    <div class="time-div">
                                        <div class="start-time">
                                            <label for="start_time">Starting at: </label>
                                            <select class="form-control" name="start_time" id="start_time"
                                                onchange="updateEndTime()" disabled>
                                                <option value="08:00">8:00 AM</option>
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
                                            </select>
                                        </div>
                                        <div class="end-time">
                                            <label for="end_time">Ending at: </label>
                                            <select class="form-control" name="end_time" id="end_time" required disabled>
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
                                        <div>
                                            <button type="submit" class="lkr-search-btn btn btn-primary" disabled>Search
                                                Lockers</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="attention-note">
                            <h2><strong>Attention!!</strong></h2>
                            <h3>Please hand over the locker key to the University Administration</h3>
                        </div>
                    @elseif ($key_manage == null)
                        <div>
                            <form method="POST" action="{{ route('user.newbooking2nd') }}" id="bookingform">
                                @csrf
                                <div class="date-time-select form-group" style="margin-top:30px;">
                                    <div class="date-div">
                                        <label for="date">Date:</label>
                                        <input class="form-control" type="date" name="date" id="date" required>
                                    </div>

                                    <div class="time-div">
                                        <div class="start-time">
                                            <label for="start_time">Starting at: </label>
                                            <select class="form-control" name="start_time" id="start_time"
                                                onchange="updateEndTime()">
                                                <option value="08:00">8:00 AM</option>
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
                                        <div>
                                            <button type="submit" class="lkr-search-btn btn btn-primary">Search
                                                Lockers</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                    <div class="alert alert-danger ms-5 me-5 mt-4" role="alert">
                        <strong>Important</strong>
                        <ul>
                            <li>• Do not attempt to place more than two bookings.</li>
                            <li>• If you didn't return your locker key, You will rescricted for new booking & Extra charge
                                will be deduct from your account.</li>
                            <li>• Make sure your account topup on time.</li>

                        </ul>
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
