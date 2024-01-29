@extends('layouts.adminsidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="flexarea-1">
                        <div>
                            <p class="path-name">Home > Lockers > Add locker</p>
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

                    <div class="locker-add-sec">
                        <h4>Add New Locker</h4>
                        <div class="">
                            <form method="POST" action="{{ route('admin.createlocker') }}" class="form-group">
                                @csrf
                                <div class="locker-add-sec-input">
                                    <div>
                                        <label for="lockername">Locker Name:</label>
                                        <input class="form-control" type="text" name="lockername" id="lockername" maxlength="10" placeholder="Last Locker : " required>
                                    </div>
                                    <div>
                                        <label for="status">Status:</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="Available" selected>Available</option>
                                            <option value="Disable">Disable</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="pos-x">Postision X:</label>
                                        <input class="form-control" type="text" name="pos-x" id="pos-x" maxlength="1" required>
                                    </div>

                                    <div>
                                        <label for="pos-y">Postision Y:</label>
                                        <input class="form-control" type="text" name="pos-y" id="pos-y" maxlength="1" required>
                                    </div>
                                    <div>
                                        <button class="addbtn btn btn-success" type="submit"><i class="fa-solid fa-plus"></i></button>
                                        <button class="addbtn btn btn-danger" type="reset"><i class="fa-solid fa-eraser"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
