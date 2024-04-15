@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">School</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Edit Content</a></li>
                </ol>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <form action="{{ route('update_contact_details') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Carrers</label>
                                    <input type="hidden" placeholder="Name" class="form-control" id="section_id" name="section_id" value="{{ $data_img['section_id'] }}">
                                    <textarea type="text" placeholder="Content" id="content" class="form-control ckeditor" name="career">{{ $data_img['career'] }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Work with us</label>
                                    <textarea type="text" placeholder="Content" id="content" class="form-control ckeditor" name="work_with">{{ $data_img['work_with'] }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Volunteer with us</label>
                                    <textarea type="text" placeholder="Content" id="volunteer" class="form-control ckeditor" name="volunteer">{{ $data_img['volunteer'] }}</textarea>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
