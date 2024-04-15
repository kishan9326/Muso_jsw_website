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
                            {{-- New Section for Displaying Videos --}}
                            <div class="table-responsive">
                                <table id="videoTable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Video</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video)
                                            <tr>
                                                <td>{{ $video->id }}</td>
                                                <td>
                                                    <video width="320" height="240" controls>
                                                        <source src="{{ url('/uploads') }}/{{ $video->video }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit_homepage_video', ['id' => $video->id]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                   <!-- <a href="{{ route('delete_homepage_video', ['id' => $video->id]) }}"
                                                        class="btn btn-danger shadow btn-xs sharp delete_user"
                                                        data-toggle="modal" data-target="#delete_user"><i
                                                            class="fa fa-trash"></i></a> -->
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

    

    <!-- Existing modal and scripts here... -->

    <!-- New Section for Video Scripts -->
@section('video_script')
    <script>
        $(document).ready(function() {
            $('#videoTable').DataTable(); // Add DataTable initialization if needed
        });
    </script>
@endsection

@endsection

