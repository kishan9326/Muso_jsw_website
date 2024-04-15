@extends('layouts.master')
@section('content')
@section('title', 'Childrens Teams')
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
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Childrens</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                            <form action="{{ route('add_teams') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Upload Image</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="child_img">
                                            </div>
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <img id="original" src="{{url('/uploads')}}/{{$event_assets[0]->img_name}}" height="70" width="70">
                                    </div>
                                </div> --}}


                                    <div class="row">
                                        <div class="mb-3 col-md-8">
                                            <label class="form-label">Upload Image</label>
                                            <div class="input-group mb-6">
                                                <div class="form-file">
                                                    <input type="file"
                                                        class="form-file-input form-control child-img-input"
                                                        name="child_img" style="display: none;"
                                                        onchange="updateChildImage(this)">
                                                </div>
                                                {{-- <span class="input-group-text"
                                                    onclick="triggerChildFileInput()">Upload</span> --}}
                                            </div>
                                            <img id="original"
                                                src="{{ url('/uploads') }}/{{ $event_assets[0]->img_name }}"
                                                height="100" width="100" class="child-img-preview"
                                                onclick="triggerChildFileInput()" style="cursor: pointer">
                                        </div>
                                    </div>






                                    <div class="row">
                                        <div class="mb-3 col-md-8">
                                            <label class="form-label">Content</label>
                                            <input type="hidden" placeholder="visit time" class="form-control"
                                                name="id" value="{{ $childrens_panel[0]->id }}">
                                            {{-- <div id="editor-container-two" style="height: 200px;"></div> --}}
                                            <textarea id="editor-content-two" type="text" placeholder="Content" class="form-control ckeditor"
                                                name="event_content">{{ $childrens_panel[0]->content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="form-label">Members</label>
                                        <?php $member = explode(',', $childrens_panel[0]->members); ?>
                                        <input type="hidden" name="number" id="countNumber"
                                            value="<?php echo count($member); ?>">
                                        <div class="mb-3 col-md-8" id="dynamicAddRemove">
                                            <?php
                                            for ($i = 0; $i < count($member); $i++) {
                                                echo '<div class="input-group mb-6"><input type="text" required name="addName[' . $i . ']" value="' . $member[$i] . '" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>';
                                            }
                                            ?>
                                        </div>
                                        <div class="mb-3 col-md-8"><button type="button" name="add" id="dynamic-ar"
                                                class="btn btn-outline-primary">Add Members</button></div>
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
<script type="text/javascript">
    $("#dynamic-ar").click(function() {
        var value = parseInt(document.getElementById('countNumber').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('countNumber').value = value;
        $("#dynamicAddRemove").append(
            '<div class="input-group mb-6"><input type="text" name="addName[' + value +
            ']" placeholder="Enter Full Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>'
        );
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).closest('div').remove();
    });
</script>


{{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quillOne = new Quill('#editor-container', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'], // Basic formatting
                [{
                    'color': []
                }, {
                    'background': []
                }], // Font color and background color
                ['link', 'image'], // Links and images
                [{ 'size': ['small', false, 'large', 'huge'] }] // Font size
            ]
        },
        theme: 'snow'
    });

    var quillTwo = new Quill('#editor-container-two', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'], // Basic formatting
                [{
                    'color': []
                }, {
                    'background': []
                }], // Font color and background color
                ['link', 'image'] // Links and images
            ]
        },
        theme: 'snow'
    });

    quillOne.on('text-change', function() {
        document.getElementById('editor-content').value = quillOne.root.innerHTML;
    });

    quillTwo.on('text-change', function() {
        document.getElementById('editor-content-two').value = quillTwo.root.innerHTML;
    });
</script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    function triggerChildFileInput() {
        document.querySelector('.child-img-input').click();
    }

    function updateChildImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.child-img-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@section('script')

@endsection
@endsection
