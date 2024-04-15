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
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Section 1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-xl-12">
                                                <form action="{{ route('update_section') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                id="section_id" name="section_id" 
                                                                value="{{ $data_img[0]->section_id }} ">
                                                            <input type="text"  placeholder="Name" class="form-control"
                                                                id="title" name="title" 
                                                                value="{{ $data_img[0]->title }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-6"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text"  placeholder="Content" id="content" class="ckeditor form-control" name="content"
                                                                rows="4" cols="50" >{{ $data_img[0]->text }} </textarea>
                                                        </div>
                                                    </div>
                                                    <!--                                     <div class="mb-3 col-md-6">
                                                <label class="form-label">User ID</label>
                                                <input type="text" class="form-control" name="user_id" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" placeholder="Email" class="form-control">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Join Date</label>
                                                <input type="text" class="form-control" name="join_date" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Phone Number</label>
                                                <input type="tel" placeholder="Phone Number" class="form-control" name="phone_number">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Role Name</label>
                                                <input type="text" class="form-control" name="role_name" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Status</label>
                                                <input type="tel" class="form-control" name="status" readonly>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Position</label>
                                                <input type="text" class="form-control" name="position" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Department</label>
                                                <input type="text" class="form-control" name="department" readonly>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div> -->
                                                    <!--                                 <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Upload File</label>
                                                <div class="input-group mb-6">
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control" name="upload[]" multiple>
                                                    </div>
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div> -->
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Section 2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-xl-12">
                                                <form action="{{ route('update_section') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-6"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                 name="section_id"
                                                                value="{{ $data_img[1]->section_id }}">
                                                            <input type="text"  placeholder="About Title" 
                                                                class="form-control" name="title"
                                                                value="{{ $data_img[1]->title }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-6"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text"  placeholder="About Content" class="ckeditor form-control" name="content" >{{ $data_img[1]->text }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-6"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content2</label>
                                                            <textarea type="text"   placeholder="About Content" class="ckeditor form-control" name="content2">{{ $data_img[1]->text2 }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            {{-- <input type="file" name="img_1" class="form-control"
                                                                placeholder=""> --}}
                                                                <label class="form-label">Upload Image</label>
                                                                <input type="file" class="form-file-input form-control section-img-input_4"
                                                                name="img_1" style="display: none;"
                                                                onchange="updateSectionImage_4(this)">
                                                                <br>
                                                            <input type="hidden" name="img_id1"
                                                                value="{{ $data_assets['img_id'][0] }}"><input
                                                                type="hidden" name="img_id2"
                                                                value="{{ $data_assets['img_id'][1] }}"><input
                                                                type="hidden" name="img_id3"
                                                                value="{{ $data_assets['img_id'][2] }}">

                                                            <img src="<?php echo url('/') . '/uploads/' . $data_assets['img_name'][0]; ?>" height="70" width="70"  class="section-img-preview_4"
                                                            onclick="triggerSectionFileInput_4()" style="cursor: pointer">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            {{-- <input type="file" name="img_2" class="form-control"
                                                                placeholder=""> --}}
                                                                <label class="form-label">Upload Image</label>
                                                                  <input type="file" class="form-file-input form-control section-img-input_5"
                                                                name="img_2" style="display: none;"
                                                                onchange="updateSectionImage_5(this)"><br>
                                                            <img src="<?php echo url('/') . '/uploads/' . $data_assets['img_name'][1]; ?>" height="70" width="70"  class="section-img-preview_5"
                                                            onclick="triggerSectionFileInput_5()" style="cursor: pointer">
                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            {{-- <input type="file" name="img_3" class="form-control"
                                                                placeholder="">  --}}
                                                                <label class="form-label">Upload Image</label>
                                                                 <input type="file" class="form-file-input form-control section-img-input_6"
                                                                name="img_3" style="display: none;"
                                                                onchange="updateSectionImage_6(this)"><br>
                                                            <img src="<?php echo url('/') . '/uploads/' . $data_assets['img_name'][2]; ?>" height="70" width="70"  class="section-img-preview_6"
                                                            onclick="triggerSectionFileInput_6()" style="cursor: pointer">
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
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Section 3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-xl-12">
                                                <form action="{{ route('update_section') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                name="section_id" value="{{ $data_img[2]->section_id }}">
                                                            <input type="text" placeholder="About Title"
                                                                class="form-control" name="title"
                                                                value="{{ $data_img[2]->title }}" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-6"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text" placeholder="About Content" class="form-control ckeditor" name="content" >{{ $data_img[2]->text }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-6"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content2</label>
                                                            <textarea type="text" placeholder="About Content" class="form-control ckeditor" name="content2" >{{ $data_img[2]->text2 }}</textarea>
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
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Section 4
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-xl-12">
                                                <form action="{{ route('update_section') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                name="section_id" value="{{ $data_img[3]->section_id }}">
                                                            <input type="text" placeholder="About Title"
                                                                class="form-control" name="title"
                                                                value="{{ $data_img[3]->title }}" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-6"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text" placeholder="About Content" class="ckeditor form-control" name="content" >{{ $data_img[3]->text }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-6"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content2</label>
                                                            <textarea type="text" placeholder="About Content" class="ckeditor form-control" name="content2" >{{ $data_img[3]->text2 }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            {{-- <input type="file" name="img_1" class="form-control"
                                                                placeholder=""> --}}
                                                                <label class="form-label"> Upload Image</label>
                                                                <input type="file" class="form-file-input form-control tagline-img-input"
                                                                name="img_1" style="display: none;"
                                                                onchange="updateTaglineImage(this)"><br>
                                                            <input type="hidden" name="img_id1"
                                                                value="{{ $data_assets['img_id'][3] }}"><input
                                                                type="hidden" name="img_id2"
                                                                value="{{ $data_assets['img_id'][4] }}"><input
                                                                type="hidden" name="img_id3"
                                                                value="{{ $data_assets['img_id'][5] }}">
                                                            <img src="<?php echo url('/') . '/uploads/' . $data_assets['img_name'][3]; ?>" height="70" width="70" class="tagline-img-preview"
                                                            onclick="triggerTaglineFileInput()" style="cursor: pointer">
                                                            {{-- <img src="{{ asset('uploads/' . $exploreSection->tagline) }}"
                                                            alt="{{ $exploreSection->title }}" width="100" class="tagline-img-preview"
                                                            onclick="triggerTaglineFileInput()" style="cursor: pointer"> --}}
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            {{-- <input type="file" name="img_2" class="form-control"
                                                                placeholder=""> --}}
                                                                <label class="form-label">Upload Image</label>
                                                                <input type="file" class="form-file-input form-control section-img-input"
                                                                name="img_2" style="display: none;"
                                                                onchange="updateSectionImage(this)"><br>
                                                            <img src="<?php echo url('/') . '/uploads/' . $data_assets['img_name'][4]; ?>" height="70" width="70"  class="section-img-preview"
                                                            onclick="triggerSectionFileInput()" style="cursor: pointer">
                                                            {{-- <img src="{{ asset('uploads/' . $exploreSection->image) }}"
                                                            alt="{{ $exploreSection->title }}" width="100" class="section-img-preview"
                                                            onclick="triggerSectionFileInput()" style="cursor: pointer"> --}}
                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            {{-- <input type="file" name="img_3" class="form-control"
                                                                placeholder=""> --}}
                                                                <label class="form-label">Upload Image</label>
                                                                <input type="file" class="form-file-input form-control section-img-input_3"
                                                                name="img_3" style="display: none;"
                                                                onchange="updateSectionImage_3(this)"><br>
                                                            <img src="<?php echo url('/') . '/uploads/' . $data_assets['img_name'][5]; ?>" height="70" width="70"  class="section-img-preview_3"
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
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Section 5
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-xl-12">
                                                <form action="{{ route('update_section') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                id="section_id" name="section_id"
                                                                value="{{ $data_img[4]->section_id }}" >
                                                            <input type="text" placeholder="Name" class="form-control"
                                                                id="title" name="title"
                                                                value="{{ $data_img[4]->title }}" >
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-12"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text" placeholder="Content" id="content" class="ckeditor form-control" name="content"
                                                                >{{ $data_img[4]->text }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- <div class="mb-3 col-md-12"> --}}
                                                        <div class="mb-3 col-md-10">
                                                            <label class="form-label">About Content2</label>
                                                            <textarea type="text"  placeholder="Content" id="content" class="ckeditor form-control" name="content2">{{ $data_img[4]->text2 }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            <input type="file" name="img_1" class="form-control"
                                                                placeholder=""><br>
                                                            <input type="hidden" name="img_id1"
                                                                value="{{ $data_assets['img_id'][6] }}">
                                                            <img id="original" src="<?php echo url('/') . '/uploads/' . $data_assets['img_name'][6]; ?>" height="70"
                                                                width="70">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label">Anual Year</label>
                                                            <input type="text"  placeholder="Name" class="form-control"
                                                                id="annual_year" name="annual_year"
                                                                value="{{ $pdf_assets->annual_year }}">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            <input type="file" name="annual_report"
                                                                class="form-control" placeholder=""><br>
                                                            <h5>{{ $pdf_assets->annual_report }}</h5>
                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="mb-3 col-md-12">
                                                            <input type="file" name="press_kit" class="form-control"
                                                                placeholder=""><br>
                                                            <h5>{{ $pdf_assets->press_kit }}</h5>
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
<script type="text/javascript">


function triggerSectionFileInput_4() {
        document.querySelector('.section-img-input_4').click();
    }
    function updateSectionImage_4(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.section-img-preview_4').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    // 


    function triggerSectionFileInput_5() {
        document.querySelector('.section-img-input_5').click();
    }

    function updateSectionImage_5(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.section-img-preview_5').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    // 


    function triggerSectionFileInput_6() {
        document.querySelector('.section-img-input_6').click();
    }

    function updateSectionImage_6(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.section-img-preview_6').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    
    // ---------------------------------------------------------------------------------------------
    
    
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
        document.querySelector('.section-img-input_3').click();
    }

    function updateSectionImage_3(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.section-img-preview_3').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
   

   
</script>
@endsection
@endsection
