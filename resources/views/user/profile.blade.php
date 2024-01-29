@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Profile</p>
                        </div>

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

                    <h2 class="topic">Profile Details</h2>
                    <div class="acc-bal-1">
                        <p>Account Balance :<b> LKR {{ Auth::user()->credit }}
                                @if (Auth::user()->credit <= 10)
                                    <i class="fa-solid fa-circle-exclamation fa-beat-fade" title="Low Credit!!!"
                                        style="color: #ff0000;"></i>
                                @endif
                            </b></p>
                    </div>
                    <div class="user-detail-sec ">
                        <div class="pro-image">
                            <img src="{{ asset('image/profilepicdummy.png') }}" alt="Profile Picture Dummy" width="200px">
                        </div>
                        <div class="pro-details">
                            <table>
                                <tr>
                                    <th>Name : </th>
                                    <td>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</td>
                                </tr>
                                <tr>
                                    <th>Email : </th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>Faculty : </th>
                                    <td>{{ Auth::user()->faculty }}</td>
                                </tr>
                                <tr>
                                    <th>Uni. Reg. No : </th>
                                    <td>{{ Auth::user()->regno }}</td>
                                </tr>
                                <tr>
                                    <th>Phone : </th>
                                    <td>{{ Auth::user()->phone }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <div class="profile-update">
                        <button type="button" class="profile-update-btn btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Update
                        </button>
                    </div>
                    <!-- Modal For Profile Data Edit and Update-->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('user.profileupdate', Auth::user()->id) }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title fs-5" id="staticBackdropLabel">My Profile</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <label for="fname">First Name :</label>
                                        <input class="form-control" type="text" name="fname" id="fname"
                                            value="{{ Auth::user()->fname }}">

                                        <label for="lname">Last Name :</label>
                                        <input class="form-control" type="text" name="lname" id="lname"
                                            value="{{ Auth::user()->lname }}">

                                        <label for="faculty">Faculty :</label>
                                        <select class="form-control" name="faculty" id="faculty">
                                            <option value="{{ Auth::user()->faculty }}">{{ Auth::user()->faculty }} - Following</option>
                                            <option value="Faculty of Technological Studies">Faculty of Technological
                                                Studies
                                            </option>
                                            <option value="Faculty of Applied Science">Faculty of Applied Science</option>
                                            <option value="Faculty of Business Studies">Faculty of Business Studies</option>
                                        </select>

                                        <label for="regno">Uni. Reg. No :</label>
                                        <input class="form-control" type="text" name="regno" id="regno"
                                            value="{{ Auth::user()->regno }}">

                                        <label for="phone">Phone :</label>
                                        <input class="form-control" type="number" name="phone" id="phone"
                                            value="{{ Auth::user()->phone }}">

                                        <label for="email">Email :</label>
                                        <input class="form-control" type="text" name="email" id="email"
                                            value="{{ Auth::user()->email }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
