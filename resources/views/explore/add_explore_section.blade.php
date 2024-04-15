@extends('layouts.master')
@section('content')
@section('title', 'Explore')
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
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Explore Details</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <form action="{{ route('add_explore_details') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <h4>Add Section Details</h4>
                                <br>
                                <br>
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Title</label>
                                    <div class="input-group mb-6">

                                        {{-- <input type="text" name="title" id="title" class="form-control"
                                            > --}}
                                            <textarea type="text" placeholder="title" id="title" class="ckeditor form-control" name="title" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Subtitle</label>

                                    <div class="input-group mb-6">
                                        {{-- <input type="text" name="subtitle" id="subtitle" class="form-control"
                                            > --}}
                                            <textarea type="text" placeholder="subtitle" id="subtitle" class="ckeditor form-control" name="subtitle" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Text</label>

                                    <div class="input-group mb-6">
                                        <textarea name="text" id="text" class="form-control ckeditor" ></textarea>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Tagline</label>

                                    <div class="input-group mb-6">
                                        <input type="text" name="tagline" id="tagline" class="form-control" >

                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Tagline</label>

                                    <div class="input-group mb-6">

                                        {{-- <div class="form-file">

                                            <input type="file" class="form-file-input form-control" name="tagline_image">
                                        </div> --}}

                                        <div class="form-file">

                                            <input type="file"class="form-file-input form-control" name="tagline_image" multiple onchange="previewImages(this, 'image-preview-1')">
                                            <div class="image-preview" id="image-preview-1" style="width: 200px"></div>

                                        </div>

                                        {{-- <span class="input-group-text">Upload</span> --}}
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Section Image</label>

                                    <div class="input-group mb-6">

                                        {{-- <div class="form-file">

                                            <input type="file" class="form-file-input form-control" name="image">
                                        </div> --}}
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control" name="image" multiple onchange="previewImages(this, 'image-preview-2')">
                                            <div class="image-preview" id="image-preview-2" style="width: 200px"></div>
                                        </div>
                                        {{-- <span class="input-group-text">Upload</span> --}}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>

    {{-- --------------------------------------------------TAB------------------------------------------------------------------------ --}}

                            <input type="hidden" id="number" name="number" value="1">
                            <div id="dynamicAddRemove1">
                                <h4>Add Tab Details</h4>
                                <br>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Tab Name</label>

                                        <div class="input-group mb-6">
                                            <input type="text"  name="tab_name[0]" placeholder=""
                                                class="form-control" />

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Tab Text</label>

                                        <div class="input-group mb-6">
                                            <input type="text"  name="tab_text[0]" placeholder=""
                                                class="form-control" />

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Upload Image</label>

                                        <div class="input-group mb-6">

                                            <div class="form-file">

                                                {{-- <input type="file" class="form-file-input form-control"
                                                    name="tab_image[0]"> --}}
                                                    <input type="file" class="form-file-input form-control" name="tab_image[0]" multiple onchange="previewImages(this, 'image-preview-3')">
                                            <div class="image-preview" id="image-preview-3" style="width: 200px"></div>
                                        
                                            </div>
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" name="add" id="dynamic-ar1" class="btn btn-outline-primary">Add
                                Tab</button>
                            <button class="btn btn-primary" type="submit">Save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>





<script type="text/javascript">
    var d = 0;
    $("#dynamic-ar1").click(function() {
        // alert('test');
        ++d;
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
        $("#dynamicAddRemove1").append(`
        <div> <h4>Add Tab Details </h4>
                                    <div class="row">
                                        <div class="mb-3 col-md-8">
                                            <label class="form-label">Tab Name</label>
                                            <div class="input-group mb-6">
                                                <input type="text"  name="tab_name[` + d + `]" placeholder="" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-8">
                                            <label class="form-label">Tab Text</label>
                                            <div class="input-group mb-6">
                                                <input type="text"  name="tab_text[` + d + `]" placeholder="" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-8">
                                            <label for="Upload Image">Image</label>
                                            <div class="input-group mb-6">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control" name="tab_image[` + d + `]">
                                                </div>
                                                <span class="input-group-text">Upload</span>                                   
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger remove-input-field">Remove</button> <br><br> 
                                    </div>
                                    `);
                                    
    });
    // $(document).on('click', '.remove-input-field', function() {
    //     $(this).closest('div').remove();
    // });

    $(document).on('click', '.remove-input-field', function() {
        var finalNumber = document.getElementById('number').value
        $('#number').val(finalNumber - 1);
        $(this).closest('div').remove();
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

<script type="text/javascript">
    function previewImages(input, previewId) {
        var imagePreviewElement = document.getElementById(previewId);

        // Clear previous previews in the specified element
        imagePreviewElement.innerHTML = '';

        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement("img");
                img.src = e.target.result;
                img.style.width = "50%";
                img.style.height = "auto";
                img.style.cursor = "pointer";

                // Append the img element to the specified element
                imagePreviewElement.appendChild(img.cloneNode(true));
            };
            reader.readAsDataURL(input.files[i]);
        }
    }
</script>
@section('script')
@endsection
@endsection
