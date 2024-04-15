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
                                                <form action="{{ route('add_data') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                name="section_id" value="1">
                                                            <input type="text" placeholder="About Title"
                                                                class="form-control" name="title"required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text" placeholder="About Content" class="ckeditor form-control" name="content"required></textarea>
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
                                                <form action="{{ route('add_data_section2') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                name="section_id" value="2">
                                                            <input type="text" placeholder="About Title"
                                                                class="form-control" name="title" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text" placeholder="About Content" class="form-control ckeditor" name="content"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Upload File</label>
                                                            <div class="input-group mb-6">
                                                                <div class="form-file">

                                                                    <input type="file"
                                                                        class="form-file-input form-control"
                                                                        name="upload[]" multiple
                                                                        onchange="previewImages(this, 'image-preview-1')">
                                                                    <div class="image-preview" id="image-preview-1"></div>

                                                                </div>
                                                                {{-- <span class="input-group-text">Upload</span> --}}
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
                                                <form action="{{ route('add_data') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                name="section_id" value="3">
                                                            <input type="text" placeholder="About Title"
                                                                class="form-control" name="title" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text" placeholder="About Content" class="form-control ckeditor" name="content" required></textarea>
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
                                                <form action="{{ route('add_data_section2') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                name="section_id" value="4">
                                                            <input type="text" placeholder="About Title"
                                                                class="form-control" name="title">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text" placeholder="About Content" class="form-control ckeditor" name="content" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Upload File</label>
                                                            <div class="input-group mb-6">
                                                                <div class="form-file">
                                                                    {{-- <input type="file"
                                                                        class="form-file-input form-control"
                                                                        name="upload[]" multiple required> --}}
                                                                    <input type="file"
                                                                        class="form-file-input form-control"
                                                                        name="upload[]" multiple
                                                                        onchange="previewImages(this, 'image-preview-2')">
                                                                    <div class="image-preview" id="image-preview-2"></div>
                                                                </div>
                                                                {{-- <span class="input-group-text">Upload</span> --}}
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
                                                <form action="{{ route('add_data_section5') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Title</label>
                                                            <input type="hidden" placeholder="Name" class="form-control"
                                                                name="section_id" value="5">
                                                            <input type="text" placeholder="About Title"
                                                                class="form-control" name="title" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">About Content</label>
                                                            <textarea type="text" placeholder="About Content" class="form-control ckeditor" name="content" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Anual Year</label>
                                                            <input type="text" placeholder="Anual Year"
                                                                class="form-control" name="anual_year" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Asset</label>
                                                            <div class="input-group mb-6">
                                                                <div class="form-file">
                                                                    <input type="file"
                                                                        class="form-file-input form-control"
                                                                        name="upload" required>
                                                                </div>
                                                                <span class="input-group-text">Upload</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Upload Anual report</label>
                                                            <div class="input-group mb-6">
                                                                <div class="form-file">
                                                                    <input type="file"
                                                                        class="form-file-input form-control"
                                                                        name="anual_report" required>
                                                                </div>
                                                                <span class="input-group-text">Upload</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Upload Press Kit</label>
                                                            <div class="input-group mb-6">
                                                                <div class="form-file">
                                                                    <input type="file"
                                                                        class="form-file-input form-control"
                                                                        name="press_kit" required>
                                                                </div>
                                                                <span class="input-group-text">Upload</span>
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
                    </div>
                </div>
            </div>

        </div>
    </div>
    <style>
        .image-preview img {
            margin-right: 10px;
            /* Add desired margin between images */
        }
    </style>
@section('script')
    {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
{{-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
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
@endsection
@endsection
