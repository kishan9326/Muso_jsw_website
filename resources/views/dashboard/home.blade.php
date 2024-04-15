@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row invoice-card-row">
            <div class="col-12">
                <h1>Hello MuSo</h1>
            </div>

        </div>

    </div>
</div>
@endsection