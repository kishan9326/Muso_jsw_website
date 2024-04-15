@extends('layouts.master')
@section('content')
@section('title', 'Consultant')
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
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Consultant Teams</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <form action="{{ route('counsult_data') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="updateConsultant" value="1">
                            <input type="hidden" id="counsult_number" name="counsult_number"
                                value="<?php echo count($consultants) - 1; ?>">
                            <div id="dynamicAddCounsultants">
                                <?php for ($i = 0; $i < count($consultants); $i++) {
                                    echo '<div><div class="row">
                                                                                                    <div class="mb-3 col-md-8">
                                                                                                    <label class="form-label">Name</label>
                                                                                                    <div class="input-group mb-6">
                                                                                                    <input type="hidden" name="id[' .
                                        $i .
                                        ']" value="' .
                                        $consultants[$i]->id .
                                        '">
                                                                                                    <input type="text" required name="consultants_name[' .
                                        $i .
                                        ']" placeholder="Enter Full Name" class="form-control" value="' .
                                        $consultants[$i]->name .
                                        '"/>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="mb-3 col-md-8">
                                                                                                    <label class="form-label">Designation</label>
                                                                                                    <div class="input-group mb-6">
                                                                                                        <textarea type="text" required placeholder="Executive Content" class="form-control ckeditor" name="consultants_designation[' .
                                        $i .
                                        ']">' .
                                        $consultants[$i]->department .
                                        '</textarea>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <button type="button" class="btn btn-outline-danger remove-input-field" onclick="deleteRecord(' .
                                        $consultants[$i]->id .
                                        ')">Remove</button></div><br><br>';
                                }
                                ?>
                            </div>
                            <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-consultants"
                                    class="btn btn-outline-primary">Add Consultants</button></div>
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
    $("#dynamic-consultants").click(function() {
        //alert('test');
        ++d;
        var value = parseInt(document.getElementById('counsult_number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('counsult_number').value = value;
        $("#dynamicAddCounsultants").append(`<div><div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Name</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="consultants_name[` + value + `]" placeholder="Enter Full Name" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Designation</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="consultants_designation[` + value +
            `]" placeholder="Designation" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                              <button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>`
        );
    });
    $(document).on('click', '.remove-input-field', function() {
        var finalNumber = document.getElementById('counsult_number').value
        $('#counsult_number').val(finalNumber - 1);
        $(this).closest('div').remove();
    });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).closest('div').remove();
    // });

    function deleteRecord(id) {
        //alert(id)
        $.ajax({
            url: "/delete_consultant",
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




@section('script')

@endsection
@endsection
