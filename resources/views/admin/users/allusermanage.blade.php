@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > User Management > All User</p>
                        </div>
                        <hr>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    {{-- <div>
                        <!-- Locker Price trigger modal -->
                        <button class="add-new-user btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add New User</button>
                    </div> --}}

                    <div class="all-user-tb">
                        <table id="example" class="ui celled table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Uni.Reg.No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->fname }} {{ $user->lname }}</td>
                                        <td>
                                            @if ($user->role_id == 1)
                                                <label for=""><i class="fa-solid fa-user-tie fa-lg"
                                                        style="color: #d66800;"></i> Admin</label>
                                            @elseif ($user->role_id == 2)
                                                <label for=""><i class="fa-solid fa-user fa-lg"
                                                        style="color: #60bc38;"></i> Student</label>
                                            @endif
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->regno }}</td>
                                        <td>
                                            @if ($user->role_id == 1)
                                                <label for=""> </label>
                                            @elseif ($user->role_id == 2)
                                                @if ($user->is_disabled == 1)
                                                    <label role="button" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop{{ $user->id }}"
                                                        for=""><i class="fa-solid fa-user-lock fa-beat-fade fa-lg"
                                                            style="color: #d02525;"></i></label>
                                                @elseif ($user->is_disabled == 0)
                                                    <label role="button" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop{{ $user->id }}"
                                                        for=""><i class="fa-solid fa-lock-open fa-lg"
                                                            style="color: #e9b116;"></i></label>
                                                @endif
                                            @endif


                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{ $user->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('update.credential', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <label for="credentials">User Credentials</label>
                                                            <select class="form-control" name="credentials"
                                                                id="credentials">
                                                                <option value="#" disabled>-- SELECT HERE --</option>
                                                                <option value="activate">Activate</option>
                                                                <option value="deactivate">Deactivate</option>
                                                            </select>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
