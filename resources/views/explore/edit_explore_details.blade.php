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
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Edit Explore Details</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <form method="POST" action="{{ route('update_explore') }}"enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="row">
                                <h4>Edit Section Details</h4>
                                <br>
                                <br>
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Title</label>
                                    <div class="input-group mb-6">
                                        {{-- <input type="text" name="title" id="title" class="form-control"
                                            required value="{{ $exploreSection->title }}"> --}}
                                        <textarea type="text" placeholder="title" id="title" class="ckeditor form-control" name="title" required>{{ $exploreSection->title }}</textarea>
                                        <input type="hidden" name="explore_id" value="{{ $exploreSection->id }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Subtitle</label>
                                    <div class="input-group mb-6">
                                        {{-- <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $exploreSection->subtitle }}" required> --}}
                                        <textarea type="text" placeholder="Subtitle" id="subtitle" class="ckeditor form-control" name="subtitle" required>{{ $exploreSection->subtitle }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Text</label>
                                    <div class="input-group mb-6">
                                        {{-- <input type="text" name="text" class="form-control"
                                            value="{{ $exploreSection->text }}"> --}}

                                        <textarea type="text" placeholder="text" id="text" class="ckeditor form-control" name="text" required>{{ $exploreSection->text }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Tagline Image -->
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Tagline</label>
                                    <div class="input-group mb-6">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control tagline-img-input"
                                                name="tagline_image" style="display: none;"
                                                onchange="updateTaglineImage(this)">
                                        </div>
                                        {{-- <span class="input-group-text">Upload</span> --}}
                                    </div>
                                    <img src="{{ asset('uploads/' . $exploreSection->tagline) }}"
                                        alt="Tagline" width="100" class="tagline-img-preview"
                                        onclick="triggerTaglineFileInput()" style="cursor: pointer">
                                        
                                </div>
                            </div>



                            {{-- <div class="row">

                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group mb-6">
                                        <div class="form-file">
                                            <input type="hidden" placeholder="visit time" class="form-control"
                                                name="section_id" value="2">
                                            <input type="file" class="form-file-input form-control child-img-input"
                                                name="executive_img" style="display: none;" onchange="updateChildImage(this)">
                                        </div>
                                        <span class="input-group-text" onclick="triggerChildFileInput()">Upload</span>
                                    </div>
                                    <img id="original" src="{{ url('/uploads') }}/{{ $event_assets[1]->img_name }}"
                                        height="100" width="100" class="child-img-preview"
                                        onclick="triggerChildFileInput()" style="cursor: pointer">

                                </div>
                            </div> --}}

                            <!-- Section Image -->
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Upload Section Image</label>
                                    <div class="input-group mb-6">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control section-img-input"
                                                name="image" style="display: none;"
                                                onchange="updateSectionImage(this)">
                                        </div>
                                        {{-- <span class="input-group-text">Upload</span> --}}
                                    </div>
                                    <img src="{{ asset('uploads/' . $exploreSection->image) }}"
                                        alt="Section Image" width="100" class="section-img-preview"
                                        onclick="triggerSectionFileInput()" style="cursor: pointer">
                                </div>
                            </div>
                            <hr>
                            <br>

                            {{-- ----------------------------------------------------TAB STARTS------------------------------------------------------------------ --}}


                            <input type="hidden" id="number" name="number" value="<?php echo count($exploreTabs) - 1; ?>">
                            <div id="dynamicAddRemove1">
                                <?php for ($i = 0; $i < count($exploreTabs); $i++) {
                                    echo '
                                                                                                         <div><div class="row">
                                                                                                         <div class="mb-3 col-md-8">
                                                                                                             <label class="form-label">Tab Name</label>
                                                                                                             <div class="input-group mb-6"> 
                                        <input type="hidden" name="explore_tab_id[' . $i . ']" value="' . $exploreTabs[$i]->id . '">
                                                                                                                <input type="text" required name="tab_name[' .
                                        $i .
                                        ']" class="form-control"
                                                                                                                    value="' .
                                        $exploreTabs[$i]->tab_name .
                                        '"/>
                                                                                                              
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                
                                                                                                     <div class="row">
                                                                                                         <div class="mb-3 col-md-8">
                                                                                                             <label class="form-label">Tab Text</label>
                                                                                                            <input type="text" required name="tab_text[' .
                                        $i .
                                        ']" class="form-control"
                                                                                                                    value="' .
                                        $exploreTabs[$i]->tab_text .
                                        '"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                
                                                                                                        <div class="row">
                                        <div class="mb-3 col-md-8">
                                            <label class="form-label">Tab Image</label><p></p>
                                            <input type="file" id="tab-image-input-' .
                                        $i .
                                        '" name="tab_image[' .
                                        $i .
                                        ']" class="form-control tab-img-input" style="display: none;" onchange="updateTabImage(this, \'tab-image-preview-' .
                                        $i .
                                        '\')"/>
                                            <img id="tab-image-preview-' .
                                        $i .
                                        '" src="' .
                                        url('/') .
                                        '/uploads/' .
                                        $exploreTabs[$i]->tab_image .
                                        '" height="70" width="70" onclick="triggerTabFileInput(\'tab-image-input-' .
                                        $i .
                                        '\')" style="cursor: pointer">
                                        </div>
                                    </div>
                                
                                                    <button type="button" class="btn btn-outline-danger remove-input-field"
                                                        onclick="deleteRecord(' .
                                        $exploreTabs[$i]->id .
                                        ')">Remove</button>
                                                    <hr>
                                                </div>
                                                <br>
                                                ';
                                }
                                ?>
                            </div>

                            <button type="button" name="add" id="dynamic-ar1" class="btn btn-outline-primary">Add
                                Tab</button>
                            <button class="btn btn-primary" type="submit">Update</button>

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
                            <div><br><br><h4>Add Tab Details </h4>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Tab Name</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="tab_name[` + value + `]" placeholder="" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Tab Text</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="tab_text[` + value + `]" placeholder="" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label for="Upload Image">Tab Image</label>
                                    <div class="input-group mb-6">
                                    <div class="form-file">
                                    <input type="file" class="form-file-input form-control" name="tab_image[` + value + `]">
                                    </div>
                                    <span class="input-group-text">Upload</span>
                                    </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-danger remove-input-field">Remove</button> <br><br>
                            </div>`);
    });

    $(document).on('click', '.remove-input-field', function() {
        var finalNumber = document.getElementById('number').value
        $('#number').val(finalNumber - 1);
        $(this).closest('div').remove();
    });

    function deleteRecord(id) {
        // alert(id)
        $.ajax({
            url: "/delete_explore_tab_details",
            type: "GET",
            data: {
                "myData": id
            }
        }).done(function(data) {
            //alert(data);
            location.reload();
        });
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
{{-- ---------------------------------------- --}}
<script type="text/javascript">
    function triggerTaglineFileInput() {
        document.querySelector('.tagline-img-input').click();
    }

    function updateTaglineImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.tagline-img-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function triggerSectionFileInput() {
        document.querySelector('.section-img-input').click();
    }

    function updateSectionImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.section-img-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function triggerTabFileInput(inputId) {
        document.getElementById(inputId).click();
    }

    function updateTabImage(input, imgId) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(imgId).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>


@section('script')
@endsection
@endsection
