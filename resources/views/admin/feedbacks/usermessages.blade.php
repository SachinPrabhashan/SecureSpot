@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Feedbacks > User Messages</p>
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

                    <div class="user-messages">
                        <div>
                            <h5>All Messages</h5>
                        </div>

                        <div class="user-messages-view">
                            <div class="message-sum">
                                @foreach ($contacts->sortByDesc('created_at') as $contact)
                                    <div class="card1 card">
                                        <div class="card-body">
                                            <div class="msg-name-date">
                                                <h6 class="card-title">{{ $contact->fullname }}</h6> {{-- <a><i
                                                        class="fa-solid fa-envelope" style="color: #ea1f1f;"></i></a> --}}
                                                <p class="msg-date">{{ $contact->created_at }}</p>
                                                <p hidden class="msg-email">{{ $contact->email }}</p>
                                                <p hidden class="msg-phone">{{ $contact->phone }}</p>
                                            </div>
                                            <p class="card-msg">{{ Str::limit($contact->message, 35) }}</p>
                                            <p hidden class="card-text">{{ $contact->message }}</p>

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="card2 card" style="width: 40rem;">
                                <div class="card-body">
                                    <div class="msg-name-date">
                                        <h6 class="card-title" id="sender-name"></h6>
                                        <p class="msg-date" id="send-date"></p>
                                    </div>
                                    <p class="msg-email card-subtitle text-body-secondary" id="sender-email"></p>
                                    <p class="msg-phone card-subtitle text-body-secondary" id="sender-phone"></p>
                                    <p class="full-msg card-text" id="sender-message"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Your existing HTML code -->

    <script>
        $(document).ready(function() {
            // Handle click event on card1 elements
            $('.card1').click(function() {
                // Get data from the clicked card1 element
                var fullName = $(this).find('.card-title').text();
                var date = $(this).find('.msg-date').text();
                var email = $(this).find('.msg-email').text().replace('Email: ', '');
                var phone = $(this).find('.msg-phone').text().replace('Phone: ', '');
                var message = $(this).find('.card-text').text();

                // Update card2 content
                $('#sender-name').text(fullName);
                $('#send-date').text(date);
                $('#sender-email').text('Email: ' + email);
                $('#sender-phone').text('Phone: ' + phone);
                $('#sender-message').text(message);


                // Make an AJAX request to update the contact status
                $.ajax({
                    url: '/update-contact-status/' + {{ $contact->id }},
                    type: 'POST',
                    success: function(response) {
                        console.log('Contact status updated successfully');
                    },
                    error: function(error) {
                        console.error('Error updating contact status');
                    }
                });
            });
        });
    </script>
@endsection
