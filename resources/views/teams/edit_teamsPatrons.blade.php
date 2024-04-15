@extends('layouts.master')
@section('content')
@section('title', 'Patrons')
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
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Patrons</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">

                        <form action="{{ route('patrons_supports') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">content</label>
                                    <div class="input-group mb-6">
                                        <textarea type="text" placeholder="Patrons Content" class="form-control ckeditor" name="content">{{ $patrons_supporters[0]->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php $sponsors = explode(',', $patrons_supporters[0]->sponsors); ?>
                                <input type="hidden" name="sponsors_number" id="sponsors_number"
                                    value="<?php echo count($sponsors); ?>">
                                <div class="mb-3 col-md-6" id="sponsors">
                                    <label class="form-label">Sponsors</label>
                                    <?php for ($i = 0; $i < count($sponsors); $i++) {
                                        echo '<div class="input-group mb-6"><input type="text" name="sponsors[' . $i . ']" value="' . $sponsors[$i] . '" placeholder="Sponsors Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>';
                                    }
                                    ?>

                                </div>

                            </div>
                            <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-sponsors"
                                    class="btn btn-outline-primary">Add Sponsors</button></div>
                            <div class="row">
                                <div class="mb-3 col-md-6" id="patrons">
                                    <?php $patrons = explode(',', $patrons_supporters[0]->patrons); ?>
                                    <input type="hidden" name="patrons_number" id="patrons_number"
                                        value="<?php echo count($patrons); ?>">
                                    <div class="mb-3 col-md-6" id="patrons">
                                        <label class="form-label">Patrons</label>
                                        <?php for ($i = 0; $i < count($patrons); $i++) {
                                            echo '<div class="input-group mb-6"><input type="text" name="patrons[' . $i . ']" value="' . $patrons[$i] . '" placeholder="Patrons Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-patrons"
                                    class="btn btn-outline-primary">Add Patrons</button></div>
                            <div class="row">
                                <?php $supporters = explode(',', $patrons_supporters[0]->supporters); ?>
                                <input type="hidden" name="supporters_number" id="supporters_number"
                                    value="<?php echo count($supporters); ?>">
                                <div class="mb-3 col-md-6" id="supporters">
                                    <label class="form-label">Supporters</label>
                                    <?php for ($i = 0; $i < count($supporters); $i++) {
                                        echo '<div class="input-group mb-6"><input type="text" name="supporters[' . $i . ']" value="' . $supporters[$i] . '" placeholder="Supporters Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-supporters"
                                    class="btn btn-outline-primary">Add Supporters</button></div>
                            <div class="row">
                                <?php $friends = explode(',', $patrons_supporters[0]->friends); ?>
                                <input type="hidden" name="friends_number" id="friends_number"
                                    value="<?php echo count($friends); ?>">
                                <div class="mb-3 col-md-6" id="friends">
                                    <label class="form-label">Friends</label>
                                    <?php for ($i = 0; $i < count($friends); $i++) {
                                        echo '<div class="input-group mb-6"><input type="text" name="friends[' . $i . ']" value="' . $friends[$i] . '" placeholder="Friends Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-friends"
                                    class="btn btn-outline-primary">Add Friends</button></div>
                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label class="form-label">Donate</label>
                                    <div class="input-group mb-6">
                                        <textarea type="text" placeholder="Donate Content" class="form-control ckeditor" name="donate">{{ $patrons_supporters[0]->donate }}</textarea>
                                    </div>
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
<script type="text/javascript">
    $("#dynamic-sponsors").click(function() {
        var value = parseInt($("#sponsors_number").val(), 10);
        value = isNaN(value) ? 0 : value;
        value++;
        $("#sponsors_number").val(value); // Update the sponsors_number input field
        $("#sponsors").append('<div class="input-group mb-6"><input type="text" required name="sponsors[' +
            value +
            ']" placeholder="Sponsors Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>'
        );
    });

    $(document).on('click', '.remove-input-field', function() {
        $(this).closest('div').remove();
        var value = parseInt($("#sponsors_number").val(), 10);
        value = isNaN(value) ? 0 : value;
        value--;
        $("#sponsors_number").val(value); // Update the sponsors_number input field
    });
</script>
<script type="text/javascript">
    $("#dynamic-patrons").click(function() {
        var value = parseInt($("#patrons_number").val(), 10);
        value = isNaN(value) ? 0 : value;
        value++;
        $("#patrons_number").val(value); // Update the patrons_number input field
        $("#patrons").append('<div class="input-group mb-6"><input type="text" required name="patrons[' +
            value +
            ']" placeholder="Patrons Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>'
        );
    });

    $(document).on('click', '.remove-input-field', function() {
        $(this).closest('div').remove();
        var value = parseInt($("#patrons_number").val(), 10);
        value = isNaN(value) ? 0 : value;
        value--;
        $("#patrons_number").val(value); // Update the patrons_number input field
    });
</script>
<script type="text/javascript">
    $("#dynamic-supporters").click(function() {
        var value = parseInt($("#supporters_number").val(), 10);
        value = isNaN(value) ? 0 : value;
        value++;
        $("#supporters_number").val(value); // Update the supporters_number input field
        $("#supporters").append('<div class="input-group mb-6"><input type="text" required name="supporters[' +
            value +
            ']" placeholder="Supporter Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>'
        );
    });

    $(document).on('click', '.remove-input-field', function() {
        $(this).closest('div').remove();
        var value = parseInt($("#supporters_number").val(), 10);
        value = isNaN(value) ? 0 : value;
        value--;
        $("#supporters_number").val(value); // Update the supporters_number input field
    });
</script>
<script type="text/javascript">
    $("#dynamic-friends").click(function() {
        var value = parseInt($("#friends_number").val(), 10);
        value = isNaN(value) ? 0 : value;
        value++;
        $("#friends_number").val(value); // Update the friends_number input field
        $("#friends").append('<div class="input-group mb-6"><input type="text" required name="friends[' +
            value +
            ']" placeholder="Friend Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>'
        );
    });

    $(document).on('click', '.remove-input-field', function() {
        $(this).closest('div').remove();
        var value = parseInt($("#friends_number").val(), 10);
        value = isNaN(value) ? 0 : value;
        value--;
        $("#friends_number").val(value); // Update the friends_number input field
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
@section('script')

@endsection
@endsection
