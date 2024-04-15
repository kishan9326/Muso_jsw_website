@extends('layouts.master')
@section('content')
@section('title', 'Advisory')
{{-- message --}}
{!! Toastr::message() !!}
<style type="text/css">
    input.hidden {
        position: absolute;
        left: -9999px;
    }

    #profile-image {
        cursor: pointer;
        width: 80px;
        height: 80px;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Advisory Teams</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <form action="{{ route('advisory_board') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" placeholder="Name" class="form-control" name="updateAdvisory" value="1">
                            
                            @foreach($advisory_board as $index => $advisory_member)
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Name</label>
                                        <div class="input-group mb-6">
                                            <input type="hidden" name="id[{{ $index + 1 }}]" value="{{ $advisory_member->id }}">
                                            <input type="text" required name="executive_name[{{ $index + 1 }}]" placeholder="Enter Full Name" value="{{ $advisory_member->name }}" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Designation</label>
                                        <div class="input-group mb-6">
                                            <input type="text" required name="designation[{{ $index + 1 }}]" placeholder="Designation" value="{{ $advisory_member->designation }}" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-10">
                                        <label class="form-label">Content</label>
                                        <div class="input-group mb-6">
                                            <textarea type="text" required placeholder="Executive Content" class="form-control ckeditor" name="executive_content[{{ $index + 1 }}]">{{ $advisory_member->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
@endsection
