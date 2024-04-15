@extends('layouts.master')
@section('content')
@section('title', 'Executive')
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
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Executive Teams</a></li>
            </ol>
        </div>
        <div class="row">
         
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <form action="{{ route('executive_team') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="row">

                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group mb-6">
                                        <div class="form-file">
                                            <input type="hidden" placeholder="visit time" class="form-control"
                                                name="section_id" value="2">
                                            <input type="file" class="form-file-input form-control child-img-input" name="executive_img" style="display: none;" onchange="updateChildImage(this)">
                                        </div>
                                        <span class="input-group-text" onclick="triggerChildFileInput()">Upload</span>
                                    </div>
                                    <img id="original" src="{{ url('/uploads') }}/{{ $event_assets[1]->img_name }}"
                                        height="100" width="100" class="child-img-preview"
                                        onclick="triggerChildFileInput()" style="cursor: pointer">

                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Upload Image</label>
                                    <div class="input-group mb-6">
                                        <div class="form-file">
                                            <input type="hidden" placeholder="visit time" class="form-control"
                                                name="section_id" value="2">
                                            <input type="file" class="form-file-input form-control child-img-input"
                                                name="executive_img" style="display: none;"
                                                onchange="updateChildImage(this)">
                                        </div>
                                        {{-- <span class="input-group-text">Upload</span> --}}
                                    </div>
                                    <img id="original" src="{{ url('/uploads') }}/{{ $event_assets[0]->img_name }}"
                                        height="70" width="70" class="child-img-preview"
                                        onclick="triggerChildFileInput()" style="cursor: pointer">
                                </div>
                            </div>





                            {{-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

                            <input type="hidden" name="number1" id="countNumber" value="<?php echo count($executive_team) - 1; ?>">
                            <div id="dynamicAddRemove1">
                                <?php for ($i = 0; $i < count($executive_team); $i++) {
                                    echo '<div><div class="row"><div class="mb-3 col-md-8">
                                                                                                    <label class="form-label">Name</label>
                                                                                                    <div class="input-group mb-6">
                                                                                                    <input type="hidden" name="id[' .
                                        $i .
                                        ']" value="' .
                                        $executive_team[$i]->id .
                                        '">
                                                                                                    <input type="text" required name="executive_name[' .
                                        $i .
                                        ']" placeholder="Enter Full Name" class="form-control" value="' .
                                        $executive_team[$i]->person_name .
                                        '" />
                                                                                                    </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="mb-3 col-md-8">
                                                                                                    <label class="form-label">Designation</label>
                                                                                                    <div class="input-group mb-6">
                                                                                                    <input type="text" required name="designation[' .
                                        $i .
                                        ']" placeholder="Designation" class="form-control" value="' .
                                        $executive_team[$i]->designation .
                                        '" />
                                                                                                    </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="mb-3 col-md-8">
                                                                                                    <label class="form-label">content</label>
                                                                                                    <div class="input-group mb-6">
                                                                                                    <textarea type="text" required placeholder="Executive Content" class="form-control ckeditor" name="executive_content[' .
                                        $i .
                                        ']">' .
                                        $executive_team[$i]->content .
                                        '</textarea>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                </div><button type="button" class="btn btn-outline-danger remove-input-field" onclick="deleteRecord(' .
                                        $executive_team[$i]->id .
                                        ')">Remove</button></div><br><br>';
                                }
                                ?>
                            </div>
                            <button type="button" name="add" id="dynamic-ar1" class="btn btn-outline-primary ashish">Add
                                Members</button>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $("#dynamic-ar1").click(function() {
        //alert('test');
        var value = parseInt(document.getElementById('countNumber').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('countNumber').value = value;
        $("#dynamicAddRemove1").append(`<div><div class="row"><div class="mb-3 col-md-8">
                                    <label class="form-label">Name</label>
                                    <input type="hidden" name="new">
                                    <div class="input-group mb-6">
                                    <input type="text" required name="executive_name[` + value + `]" placeholder="Enter Full Name" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Designation</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="designation[` + value +
            `]" placeholder="Designation" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">content</label>
                                    <div class="input-group mb-6">
                                    <textarea required placeholder="Executive Content" class="form-control gosavi" name="executive_content[` +
            value +
            `]"></textarea>
                                    </div>
                                    </div>
                                </div><button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>`
        );
    });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).closest('div').remove();
    // });
    $(document).on('click', '.remove-input-field', function() {
        var finalNumber = document.getElementById('countNumber').value
        $('#countNumber').val(finalNumber - 1);
        $(this).closest('div').remove();
    });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).closest('div').remove();
    // });

    function deleteRecord(id) {
        //alert(id)
        $.ajax({
            url: "/delete_executive_team",
            type: "GET",
            data: {
                "myData": id
            }
        }).done(function(data) {
            //alert(data);
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
    $(".ashish").click(function(){
        CKEDITOR.appendTo( 'ashish' , config, '' );
        // $('.ckeditor').ckeditor();
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
