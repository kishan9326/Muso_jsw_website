@extends('layouts.master')
@section('title', 'Edit Homepage Video')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('show_homepage_videos') }}">Homepage Videos</a></li>
                    <li class="breadcrumb-item active">Edit Video</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Homepage Video</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('update_homepage_video', ['id' => $video->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="current_video">Current Video</label>
                                    <video width="320" height="240" controls>
                                        <source src="{{ url('/uploads') }}/{{ $video->video }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="form-group">
                                    <label for="new_video">Choose New Video</label>
                                    <input type="file" name="video" class="form-control" accept="video/*" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Video</button>
                                    <a href="{{ route('show_homepage_videos') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
