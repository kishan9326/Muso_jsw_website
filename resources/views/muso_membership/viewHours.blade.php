@extends('layouts.master')
@section('title', 'Visit Hours')
@section('content')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('viewVisit_hours') }}">Visit Hours</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Membership Plan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Muso Galleries</th>
                                        <th>Sabko Counter</th>
                                        <th>Library</th>
                                        <th>The Shop</th>
                                        <th>Sabko cafe</th>
                                        <th>Recycling Center</th>
                                        <th>The Commons</th>
                                        <th>Immersive Gallery</th>
                                        <th>Parking Garage</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(count($visit_hours)>0){ ?>
                                    <tr>
                                        <td class="section_id">{{ $visit_hours[0]->id }}</td>
                                        <td class="muso_galleries">{{ $visit_hours[0]->muso_galleries }}</td>
                                        <td class="subko_counter">{{ $visit_hours[0]->subko_counter }}</td>
                                        <td class="library">{{ $visit_hours[0]->library }}</td>
                                        <td class="the_shop">{{ $visit_hours[0]->the_shop }}</td>
                                        <td class="subko_cafe">{{ $visit_hours[0]->subko_cafe }}</td>
                                        <td class="recycling_center">{{ $visit_hours[0]->recycling_center }}</td>
                                        <td class="the_commons">{{ $visit_hours[0]->the_commons }}</td>
                                        <td class="immersive_gallery">{{ $visit_hours[0]->immersive_gallery }}</td>
                                        <td class="parking_garage">{{ $visit_hours[0]->parking_garage }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary shadow btn-xs sharp me-1 edit_user" href="#" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger shadow btn-xs sharp delete_user" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash"></i></a>
                                            </div>                                    
                                        </td>                                               
                                    </tr>
                                <?php }
                                else {echo 'No records';} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Expense Modal -->
<div id="edit_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('addVisitHoursData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Muso Galleries and exibitions</label>
                                        <input type="hidden" placeholder="Muso Galleries and exibitions" class="form-control" id="section_id" name="updateHistory">
                                        <input type="text" placeholder="Muso Galleries and exibitions" class="form-control" id="muso_gallery" name="muso_gallery">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Subko counter</label>
                                        <input type="text" placeholder="Subko counter" class="form-control" id="subko_counter" name="subko_counter">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Library</label>
                                        <input type="text" placeholder="Library" class="form-control" id="library" name="library">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">The Shop</label>
                                        <input type="text" placeholder="The Shop" class="form-control" id="the_shop" name="the_shop">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Subko Cafe</label>
                                        <input type="text" placeholder="Subko Cafe" class="form-control" id="subko_cafe" name="subko_cafe">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Recycling Center</label>
                                        <input type="text" placeholder="Recycling Center" class="form-control" id="recycling_center" name="recycling_center">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">The Commons</label>
                                        <input type="text" placeholder="The Commons" class="form-control" id="the_commons" name="the_commons">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Immersive Gallery</label>
                                        <input type="text" placeholder="Immersive Gallery" class="form-control" id="immersive_gallery" name="immersive_gallery">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Parking garage</label>
                                        <input type="text" placeholder="Parking garage" class="form-control" id="parking_garage" name="parking_garage">
                                    </div>
                                </div>
                                <div id="dynamic-content"></div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Expense Modal -->

<!-- Delete User Modal -->
<div class="modal custom-modal fade" id="delete_user" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete User</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('deletVisitHoursRecord') }}" method="POST">
                        @csrf
                        <input type="hidden" id="e_id" name="id">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary-cus continue-btn submit-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary-cus cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete User Modal -->
@section('script')
    <!-- Bootstrap Core JS -->
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
    <script>
        $(document).on('click','.edit_user',function()
        {
            var _this = $(this).parents('tr');
            $('#section_id').val(_this.find('.section_id').text());
            $('#muso_gallery').val(_this.find('.muso_galleries').text());
            $('#subko_counter').val(_this.find('.subko_counter').text());
            $('#library').val(_this.find('.library').text());
            $('#the_shop').val(_this.find('.the_shop').text());
            $('#subko_cafe').val(_this.find('.subko_cafe').text());
            $('#recycling_center').val(_this.find('.recycling_center').text());
            $('#the_commons').val(_this.find('.the_commons').text());
            $('#immersive_gallery').val(_this.find('.immersive_gallery').text());
            $('#parking_garage').val(_this.find('.parking_garage').text());
        });
    </script>

    {{-- delete user --}}
    <script>
        $(document).on('click','.delete_user',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.section_id').text());
        });
    </script>
    {{-- show data on model or edit --}}

    {{-- delete user --}}


<!-- <script type="text/javascript">
$(function() {
$('#profile-image').on('click', function() {
    alert('test');

});

});
</script> -->

@endsection
@endsection
