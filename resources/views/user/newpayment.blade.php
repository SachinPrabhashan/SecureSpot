@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 payment-card">
            <div class="payment-card card">
                <div class="flexarea-1">
                    <div>
                        <p class="path-name">Home > Payments > New Payment</p>
                    </div>
                </div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> --}}

                <div class="attention-note-1">
                    <h2><strong>ANNOUNCEMENT</strong></h2>
                    <h3>Please Contact University Administration for Account TopUps</h3>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
