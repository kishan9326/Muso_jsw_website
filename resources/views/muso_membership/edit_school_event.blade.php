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
                        <form action="{{ route('addSchoolEventData') }}" method="post" enctype="multipart/form-data">
                            @csrf



                            <div class="row">


                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Content</label>
                                    <input type="hidden" placeholder="Name" class="form-control" name="event_id"
                                        value={{ $membership_data[0]->id }}>
                                    <textarea type="text" placeholder="Event Content" class="form-control ckeditor" name="content">{{ $membership_data[0]->content }}</textarea>
                                </div>
                            </div>
                           
                            <?php
                            $images = explode(',', $membership_data[0]->img_name);
                            foreach ($images as $image) {
                                // echo '<img src="'.url('/').'/uploads/'.$image.'" height="70" width="70"/>'.'&nbsp;&nbsp;&nbsp;';
                                $final_image[] = $image;
                            }
                            
                            ?>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Upload Image</label>
                                    <input type="hidden" name="img_name1" class="form-control" placeholder=""
                                        value="{{ $final_image[0] }}"> <br>

                                    <input type="file" class="form-file-input form-control tagline-img-input"
                                        name="img_1" style="display: none;" onchange="updateTaglineImage(this)">

                                    <img src="<?php echo url('/') . '/uploads/' . $final_image[0]; ?>" width="100" class="tagline-img-preview"
                                        onclick="triggerTaglineFileInput()" style="cursor: pointer">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Upload Image</label>
                                    <input type="hidden" name="img_name2" class="form-control" placeholder=""
                                        value="{{ $final_image[1] }}"><br>
                                    <input type="file" class="form-file-input form-control section-img-input"
                                        name="img_2" style="display: none;" onchange="updateSectionImage(this)">

                                    <img src="<?php echo url('/') . '/uploads/' . $final_image[1]; ?>" width="100" class="section-img-preview"
                                        onclick="triggerSectionFileInput()" style="cursor: pointer">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Upload Image</label>
                                    <input type="hidden" name="img_name3" class="form-control" placeholder=""
                                        value="{{ $final_image[2] }}">

                                    <input type="file" class="form-file-input form-control section-img-input-tab"
                                        name="img_3" style="display: none;" onchange="updateSectionImage_3(this)">
                                    <br>
                                    <img src="<?php echo url('/') . '/uploads/' . $final_image[2]; ?>" width="100" class="section-img-preview-tab"
                                        onclick="triggerSectionFileInput_3()" style="cursor: pointer">
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

    {{-- ------- --}}
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

        function triggerSectionFileInput_3() {
            document.querySelector('.section-img-input-tab').click();
        }

        function updateSectionImage_3(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.section-img-preview-tab').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

@section('script')
@endsection
@endsection
