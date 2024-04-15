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
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Quaterly Mini Membership
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('addMemberhipData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price with text</label>
                                        <input type="hidden" placeholder="Name" class="form-control" name="membership_id" value="1">
                                        <input type="text" placeholder="Price and childrens count" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tag line</label>
                                        <input type="text" placeholder="Tag line" class="form-control" name="tag_line">
                                    </div>
                                </div>
                                 <div class="row">
                                    <label class="form-label">Membership Information Points</label>
                                    <div class="mb-3 col-md-8" id="dynamicAddRemove">
                                    <div class="input-group mb-6">
                                    <input type="text" name="addName[0]" placeholder="Enter Points" class="form-control" />&nbsp;&nbsp;
                                    </div><br>
                                    </div>
                                     <div class="mb-3 col-md-8"><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Members</button></div>
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
        Annual Family Membership
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('addMemberhipData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price with text</label>
                                        <input type="hidden" placeholder="Name" class="form-control" name="membership_id" value="2">
                                        <input type="text" placeholder="Price and childrens count" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tag line</label>
                                        <input type="text" placeholder="Tag line" class="form-control" name="tag_line">
                                    </div>
                                </div>
                                 <div class="row">
                                    <label class="form-label">Membership Information Points</label>
                                    <div class="mb-3 col-md-8" id="dynamicAddRemove1">
                                    <div class="input-group mb-6">
                                    <input type="text" name="addName[0]" placeholder="Enter Points" class="form-control" />&nbsp;&nbsp;
                                    </div><br>
                                    </div>
                                     <div class="mb-3 col-md-8"><button type="button" name="add" id="dynamic-ar1" class="btn btn-outline-primary">Add Members</button></div>
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
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Annual Champion Membership
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                   <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('addMemberhipData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price with text</label>
                                        <input type="hidden" placeholder="Name" class="form-control" name="membership_id" value="3">
                                        <input type="text" placeholder="Price and childrens count" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tag line</label>
                                        <input type="text" placeholder="Tag line" class="form-control" name="tag_line">
                                    </div>
                                </div>
                                 <div class="row">
                                    <label class="form-label">Membership Information Points</label>
                                    <div class="mb-3 col-md-8" id="dynamicAddRemove2">
                                    <div class="input-group mb-6">
                                    <input type="text" name="addName[0]" placeholder="Enter Points" class="form-control" />&nbsp;&nbsp;
                                    </div><br>
                                    </div>
                                     <div class="mb-3 col-md-8"><button type="button" name="add" id="dynamic-ar2" class="btn btn-outline-primary">Add Members</button></div>
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
        5-Years Patron Membership
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                   <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('addMemberhipData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price with text</label>
                                        <input type="hidden" placeholder="Name" class="form-control" name="membership_id" value="4">
                                        <input type="text" placeholder="Price and childrens count" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tag line</label>
                                        <input type="text" placeholder="Tag line" class="form-control" name="tag_line">
                                    </div>
                                </div>
                                 <div class="row">
                                    <label class="form-label">Membership Information Points</label>
                                    <div class="mb-3 col-md-8" id="dynamicAddRemove3">
                                    <div class="input-group mb-6">
                                    <input type="text" name="addName[0]" placeholder="Enter Points" class="form-control" />&nbsp;&nbsp;
                                    </div><br>
                                    </div>
                                     <div class="mb-3 col-md-8"><button type="button" name="add" id="dynamic-ar3" class="btn btn-outline-primary">Add Points</button></div>
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
        Event or school visit
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                   <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('addSchoolEventData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Content</label>
                                        <textarea type="text" placeholder="Event Content" class="form-control" name="content"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-8">
                                        <label class="form-label">Upload Image</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="event_img[]" multiple>
                                            </div>
                                            <span class="input-group-text">Upload</span>
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
    var i = 0;
    $("#dynamic-ar").click(function () {
        //alert('test');
        ++i;
        $("#dynamicAddRemove").append('<div class="input-group mb-6"><input type="text" name="addName[' + i +
            ']" placeholder="Enter Points" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar1").click(function () {
        //alert('test');
        ++i;
        $("#dynamicAddRemove1").append('<div class="input-group mb-6"><input type="text" name="addName[' + i +
            ']" placeholder="Enter Points" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar2").click(function () {
        //alert('test');
        ++i;
        $("#dynamicAddRemove2").append('<div class="input-group mb-6"><input type="text" name="addName[' + i +
            ']" placeholder="Enter Points" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar3").click(function () {
        //alert('test');
        ++i;
        $("#dynamicAddRemove3").append('<div class="input-group mb-6"><input type="text" name="addName[' + i +
            ']" placeholder="Enter Points" class="form-control" />&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger remove-input-field">Remove</button></div><br>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).closest('div').remove();
    });
</script>
@endsection
@endsection
