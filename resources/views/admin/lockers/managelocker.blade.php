@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Lockers > Manage Locker</p>
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
                        <a class="new-locker" href="{{ route('admin.addlocker') }}"><button class="btn btn-primary"
                                title="Add Locker"><i class="fa-solid fa-plus"></i> Add</button></a>
                        <!-- Locker Price trigger modal -->
                        <button class="locker-price btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            title="Change Locker Price"><i class="fa-solid fa-dollar-sign"></i>
                            Locker Price</button>
                    </div>




                    <div class="locker-manage-tb">
                        <h4>Locker List View</h4>
                        <table id="example" class="ui celled table" style="width:100%">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Locker Name</th>
                                    <th>Status</th>
                                    <th>Position X</th>
                                    <th>Position Y</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lockers as $locker)
                                    <tr>
                                        <td>{{ $locker->id }}</td>
                                        <td>{{ $locker->locker_type }}</td>
                                        <td>
                                            @if ($locker->status == 'Available')
                                                {{--  <img src="{{ asset('image/Active-green.png') }}" alt=""
                                                    width="60px"> --}}
                                                <label class="available">Available</label>
                                            @elseif ($locker->status == 'Disable')
                                                {{-- <img src="{{ asset('image/Disable-red.png') }}" alt=""
                                                    width="60px"> --}}
                                                <label class="notavailable">Not Available</label>
                                            @elseif ($locker->status == 'booked')
                                                {{-- <img src="{{ asset('image/Booked-blue.png') }}" alt=""
                                                    width="60px"> --}}
                                            @endif
                                        </td>
                                        <td>{{ $locker->position_x }}</td>
                                        <td>{{ $locker->position_y }}</td>
                                        <td>
                                            {{-- <a href=""><i class="fa-solid fa-pen-to-square" style="color: #198754;" title="Edit"></i></a> --}}
                                            <a href="#" class="edit-locker" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $locker->id }}"
                                                data-locker-id="{{ $locker->id }}"
                                                data-locker-name="{{ $locker->locker_type }}"
                                                data-locker-status="{{ $locker->status }}"
                                                data-locker-post-x="{{ $locker->position_x }}"
                                                data-locker-post-y="{{ $locker->position_y }}">
                                                <i class="fa-solid fa-pen-to-square" style="color: #198754;"
                                                    title="Edit"></i></a>


                                            <a href="#"><i class="fa-solid fa-binoculars" style="color: #7139db;"
                                                    title="Lookup"></i></a>
                                            @if ($locker->status == 'booked')
                                                <a href="#"><img src="{{ asset('image/trash-solid-not.png') }}"
                                                        alt="" width="14px" style="margin-bottom: 4px;"></i></a>
                                            @else
                                                <a href="{{ route('admin.lockerdelete', $locker->id) }}"
                                                    onclick="return confirm('Are you want to delete?');"><i
                                                        class="fa-solid fa-trash" style="color: #DC3545;"
                                                        title="Delete"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($lockers as $locker)
            <!-- Edit PopUp Modal -->
            <div class="modal fade" id="staticBackdrop{{ $locker->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $locker->id }}"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5" id="staticBackdropLabel">Edit Locker</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Locker ID: <span id="lockerIdPlaceholder{{ $locker->id }}"></span></p>
                            <div class="edit-popup-modal">
                                <form action="{{ route('admin.updatelocker', $locker->id) }}" method="POST">
                                    @csrf
                                    <div>
                                        <label for="lockername">Locker Name : </label>
                                        <input class="form-control" type="text" name="lockername"
                                            id="lockername{{ $locker->id }}">
                                    </div>

                                    <div>
                                        <label for="status">Status : </label>
                                        <select class="form-control statusdrop" name="status" id="status">
                                            {{-- <option value="booked">Booked</option> --}}
                                            <option value="Available">Available</option>
                                            <option value="Disable">Not Available</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="pos-x">Position X : </label>
                                        <input class="form-control" type="number" name="pos-x"
                                            id="pos-x{{ $locker->id }}">
                                    </div>
                                    <div>
                                        <label for="pos-y">Position Y : </label>
                                        <input class="form-control" type="number" name="pos-y" id="pos-y">
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>


            @if (isset($unitprice))
                <!-- Locker Price Change Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">Change Locker Price</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.lockerpriceupdate') }}" method="POST">
                                    @csrf

                                    <label for="unitprice">Price Per Unit:(LKR)</label>
                                    <input class="form-control" type="number" name="unitprice" id="unitprice"
                                        value="{{ $unitprice->value('unitprice') }}" required>

                                    <label for="unitsize">Unit Size:(Min)</label>
                                    <input class="form-control" type="number" name="unitsize" id="unitsize"
                                        value="{{ $unitprice->value('unitsize') }}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modals = document.querySelectorAll('.modal');
            const lockerIdPlaceholders = document.querySelectorAll('[id^="lockerIdPlaceholder"]');
            const lockerNameInputs = document.querySelectorAll('[id^="lockername"]');
            const statusInputs = document.querySelectorAll('[id^="status"]');
            const pos_xInputs = document.querySelectorAll('[id^="pos-x"]');
            const pos_yInputs = document.querySelectorAll('[id^="pos-y"]');
            const editButtons = document.querySelectorAll('.edit-locker');

            editButtons.forEach(function(button, index) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const lockerId = button.getAttribute('data-locker-id');

                    lockerIdPlaceholders[index].textContent = lockerId;
                    lockerNameInputs[index].value = button.getAttribute('data-locker-name');
                    statusInputs[index].value = button.getAttribute('data-locker-status');
                    pos_xInputs[index].value = button.getAttribute('data-locker-post-x');
                    pos_yInputs[index].value = button.getAttribute('data-locker-post-y');

                    modals[index].show();
                });
            });
        });
    </script>
@endsection
