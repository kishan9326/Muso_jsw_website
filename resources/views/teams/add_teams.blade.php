@extends('layouts.master')
@section('content')
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
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Event</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Content</a></li>
            </ol>
        </div>
        <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       Children's Panel
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                <div class="row">   
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('add_teams') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Upload Image</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="child_img">
                                            </div>
                                            <span class="input-group-text">Upload</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Content</label>
                                        <input type="hidden" placeholder="visit time" class="form-control" name="section_id" value="1">
                                        <textarea type="text" placeholder="Content" class="form-control ckeditor" name="event_content" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8" id="dynamicAddRemove">
                                    <div class="input-group mb-6">
                                    <input type="text" name="addName[0]" required placeholder="Enter Full Name" class="form-control"  />&nbsp;&nbsp;
                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Members</button>
                                    </div><br>
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
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       Executive Team
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="row">
                        <div class="col-xl-12">
                             <form action="{{ route('executive_team') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Upload Image</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="hidden" placeholder="visit time" class="form-control" name="section_id" value="2">
                                                <input type="file" class="form-file-input form-control" name="executive_img">
                                            </div>
                                            <span class="input-group-text">Upload</span>
                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" id="number" name="number" value="1">
                                <div id="dynamicAddRemove1">
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Name</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="executive_name[0]"  placeholder="Enter Full Name" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Designation</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="designation[0]" placeholder="Designation" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">content</label>
                                    <div class="input-group mb-6">
                                    <textarea type="text" required placeholder="Executive Content" class="form-control ckeditor" name="executive_content[0]"></textarea>
                                    </div>
                                    </div>
                                </div>
                              </div>
                               <button type="button" name="add" id="dynamic-ar1" class="btn btn-outline-primary">Add Members</button>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Join Us
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                   <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('add_join_content') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Join us content</label>
                                        <input type="hidden" placeholder="Name" class="form-control" name="section_id" value="3">
                                         <textarea type="text" required placeholder="Join us content" class="form-control" name="join_us"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">JSW Content</label>
                                       <textarea type="text" required placeholder="JSW Content" class="form-control" name="jsw_content"></textarea>
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
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Advisory Board
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                   <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('advisory_board') }}" method="post" enctype="multipart/form-data">
                               @csrf
                               <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Name</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="executive_name[1]" placeholder="Enter Full Name" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Designation</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="designation[1]" placeholder="Designation" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">content</label>
                                    <div class="input-group mb-6">
                                    <textarea type="text" required placeholder="Executive Content" class="form-control" name="executive_content[1]"></textarea>
                                    </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Name</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="executive_name[2]" placeholder="Enter Full Name" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Designation</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="designation[2]" placeholder="Designation" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">content</label>
                                    <div class="input-group mb-6">
                                    <textarea type="text" required placeholder="Executive Content" class="form-control" name="executive_content[2]"></textarea>
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
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        Patrons & Supporters
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
          <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('patrons_supports') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">content</label>
                                    <div class="input-group mb-6">
                                    <textarea type="text" required placeholder="Patrons Content" class="form-control" name="content"></textarea>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6" id="sponsors">
                                        <label class="form-label">Sponsors</label>
                                        <input type="text" required placeholder="Sponsors" class="form-control" name="sponsors[0]">
                                    </div>
                                    <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-sponsors" class="btn btn-outline-primary">Add Sponsors</button></div>
                                </div>
                                <div class="row">
                                  <div class="mb-3 col-md-6" id="patrons">
                                      <label class="form-label">Patrons</label>
                                        <input type="text" required placeholder="Patrons" class="form-control" name="patrons[0]">
                                    </div>
                                    <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-patrons" class="btn btn-outline-primary">Add Patrons</button></div>
                                </div>
                                <div class="row">
                                <div class="mb-3 col-md-6" id="supporters">
                                      <label class="form-label">Supporters</label>
                                        <input type="text" required placeholder="Supporters" class="form-control" name="supporters[0]">
                                    </div>
                                    <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-supporters" class="btn btn-outline-primary">Add Supporters</button></div>
                                </div>
                                <div class="row">
                                <div class="mb-3 col-md-6" id="friends">
                                      <label class="form-label">Friends</label>
                                        <input type="text" required placeholder="Friends" class="form-control" name="friends[0]">
                                    </div>
                                    <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-friends" class="btn btn-outline-primary">Add Friends</button></div>
                                </div>
                               <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Donate</label>
                                    <div class="input-group mb-6">
                                    <textarea type="text" required placeholder="Donate Content" class="form-control" name="donate"></textarea>
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
    <h2 class="accordion-header" id="headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        Consultants
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                   <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('counsult_data') }}" method="post" enctype="multipart/form-data">
                               @csrf
                               <input type="hidden" id="counsult_number" name="counsult_number" value="0">
                               <div id="dynamicAddCounsultants">
                               <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Name</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="consultants_name[0]" placeholder="Enter Full Name" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Designation</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="consultants_designation[0]" placeholder="Designation" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="mb-3 col-md-6"><button type="button" name="add" id="dynamic-consultants" class="btn btn-outline-primary">Add Consultants</button></div>
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
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        //alert('test');
        ++i;
        $("#dynamicAddRemove").append('<div class="input-group mb-6"><input type="text" required name="addName[' + i +
            ']" placeholder="Enter Full Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-sponsors").click(function () {
        //alert('test');
        ++i;
        $("#sponsors").append('<div class="input-group mb-6"><input type="text" required name="sponsors[' + i +
            ']" placeholder="Sponsors Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-patrons").click(function () {
        //alert('test');
        ++i;
        $("#patrons").append('<div class="input-group mb-6"><input type="text" required name="patrons[' + i +
            ']" placeholder="Patrons Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-supporters").click(function () {
        //alert('test');
        ++i;
        $("#supporters").append('<div class="input-group mb-6"><input type="text" required name="supporters[' + i +
            ']" placeholder="Sponsors Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-friends").click(function () {
        //alert('test');
        ++i;
        $("#friends").append('<div class="input-group mb-6"><input type="text" required name="friends[' + i +
            ']" placeholder="Friends Name" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>
<script type="text/javascript">
    var d = 0;
    $("#dynamic-ar1").click(function () {
        //alert('test');
        ++d;
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
        $("#dynamicAddRemove1").append(`<div class="row"><div class="mb-3 col-md-8">
                                    <label class="form-label">Name</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="executive_name[` + d + `]" placeholder="Enter Full Name" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Designation</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="designation[` + d + `]" placeholder="Designation" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">content</label>
                                    <div class="input-group mb-6">
                                    <textarea type="text" required placeholder="Executive Content" class="form-control" name="executive_content[` + d + `]"></textarea>
                                    </div>
                                    </div>
                                </div>`
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>
<script type="text/javascript">
    var d = 0;
    $("#dynamic-consultants").click(function () {
        //alert('test');
        ++d;
        var value = parseInt(document.getElementById('counsult_number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('counsult_number').value = value;
        $("#dynamicAddCounsultants").append(`<div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Name</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="consultants_name[` + d +`]" placeholder="Enter Full Name" class="form-control" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                    <label class="form-label">Designation</label>
                                    <div class="input-group mb-6">
                                    <input type="text" required name="consultants_designation[` + d +`]" placeholder="Designation" class="form-control" />
                                    </div>
                                    </div>
                                </div>`
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>
   <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
       <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@section('script')

@endsection
@endsection
