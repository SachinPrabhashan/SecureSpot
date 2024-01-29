@extends('layouts.adminsidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="flexarea-1">
                    <div>
                        <p class="path-name">Home > Lockers > View Locker</p>
                    </div>
                    <hr>
                </div>

{{--                 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> --}}

                <div>
                    <div class="locker-sec">
                        <label></label>
                        <div class="locker-area">
                            <div class="select-locker">
                                @php
                                    $lockersChunks = $lockers->chunk(5);
                                @endphp

                                @foreach ($lockersChunks as $col)
                                    <div class="lockers">
                                        @foreach ($col as $locker)
                                            <div class="locker-item" role="button">


                                                <div class="locker">
                                                    <input name="selected_locker" id="{{ $locker->locker_type }}" type="checkbox" class="locker-checkbox" value="{{ $locker->id }}" onclick="validateCheckboxes()">
                                                    <label data-toggle="tooltip" for="{{ $locker->locker_type }}">
                                                        <span><i class="fa-solid fa-vault ms-0"></i>
                                                            {{ $locker->locker_type }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
