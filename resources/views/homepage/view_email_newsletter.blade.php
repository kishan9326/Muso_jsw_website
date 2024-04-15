@extends('layouts.master')
@section('title', 'Explore')
@section('content')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view_email_newsletter') }}">Muso Explore</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Explore Section</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email Newsletter</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($email_details as $detail)
                                    <tr>
                                        <td class="section_id">{{ $detail->id }}</td>
                                        <td>{{ $detail->email_newsletter }}</td>
                                        <td>{{ $detail->date }}</td>
                                        
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('delete_email_newsletter', ['id' => $detail->id]) }}"
                                                    class="btn btn-danger shadow btn-xs sharp delete_user"
                                                    data-toggle="modal" data-target="#delete_user"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@    <!-- Existing modal and scripts here... -->

<!-- New Section for Video Scripts -->
@section('video_script')
<script>
    $(document).ready(function() {
        $('#videoTable').DataTable(); // Add DataTable initialization if needed
    });
</script>
@endsection

@endsection
