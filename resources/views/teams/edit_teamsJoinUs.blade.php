@extends('layouts.master')
@section('content')
@section('title', 'Join Us')
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
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Join Us</a></li>
            </ol>
        </div>
         <div class="row">   
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                            <form action="{{ route('add_join_content') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Join us content</label>
                                        <input type="hidden" placeholder="Name" class="form-control" name="updateJsw" value="1">
                                        <input type="hidden" placeholder="Name" class="form-control" name="section_id" value="3">
                                         <textarea type="text" placeholder="Join us content" class="form-control ckeditor" name="join_us">{{$join_us[0]->join_us}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">JSW Content</label>
                                       <textarea type="text" placeholder="JSW Content" class="form-control ckeditor" name="jsw_content">{{$join_us[0]->jsw_content}}</textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
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
