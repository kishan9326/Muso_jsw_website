@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">About</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Content</a></li>
            </ol>
        </div>

                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('addMemberhipData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price with text</label>
                                        <input type="hidden" placeholder="Name" class="form-control" name="membership_id" value="{{$membership_data[0]->membership_id}}">
                                        <input type="text"required placeholder="Price and childrens count" class="form-control" name="price" value="{{$membership_data[0]->price_text}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tag line</label>
                                        <input type="text"required placeholder="Tag line" class="form-control" name="tag_line"  value="{{$membership_data[0]->tag_line}}">
                                    </div>
                                </div>
                                 <div class="row">
                                    <label class="form-label">Membership Information Points</label>
                                    <input type="hidden" name="number" id="countNumber" value="<?php echo count($points)-1;?>">
                                    <div class="mb-3 col-md-8" id="dynamicAddRemove">
                                        <?php
                                        for($i=0; $i < count($points); $i++)
                                        { echo '<div class="input-group mb-6"><input type="hidden" name="id['.$i.']" value="'.$points[$i]->id.'"><input type="text" name="terms_condition['.$i.']" value="'.$points[$i]->terms_condition.'" class="form-control" />&nbsp;&nbsp;<button type="button" onclick="deleteRecord('.$points[$i]->id.')" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>';
                                        }
                                        ?>
                                    
                                    </div>
                                     <div class="mb-3 col-md-8"><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add points</button></div>
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
</div>

@section('script')
<script type="text/javascript">
 $("#dynamic-ar").click(function () {
        var value = parseInt(document.getElementById('countNumber').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('countNumber').value = value;
        $("#dynamicAddRemove").append('<div class="input-group mb-6"><input type="text"required name="terms_condition[' + value +
            ']" placeholder="Enter Full Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        var finalNumber = document.getElementById('countNumber').value
        $('#countNumber').val(finalNumber-1);
         $(this).closest('div').remove();
    });

    function deleteRecord(id)
    {
        //alert(id)
        $.ajax({
        url: "/deleteMembership",
        type: "GET",
        data:{"myData":id}
        }).done(function(data) {
        //alert(data);
        });
    }
</script>

@endsection
@endsection
