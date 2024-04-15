@extends('layouts.master')
@section('title', 'Contact Details')
@section('content')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('get_contact_details') }}">Contact Details</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Of Contact</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Section</th>
                                        <th>Title</th>
                                        <th>Time</th>
                                        <th>Mobile</th>
                                        <th>Email id</th>
                                        <th>Career</th>
                                        <th>Work</th>
                                        <th>Volunteer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($data as $items)
                                    <tr>
                                        <td class="section_id">{{ $items['section_id'] }}</td>
                                        <td>{{ $items['title'] }}</td>
                                        <td class="name">{!! $items['office_time'] !!}</td>
                                        <td class="name">{!! $items['mobile'] !!}</td>
                                        <td class="name">{!! $items['email'] !!}</td>
                                        @if($items['section_id'] == 7)
                                        <td class="user_id">{!!$items['career']!!}</td>
                                        <td class="user_id">{!!$items['work_with']!!}</td>
                                        <td class="user_id">{!!$items['volunteer']!!}</td>
                                        @else
                                        <td class="name"></td>
                                        <td class="name"></td>
                                        <td class="name"></td>
                                        @endif
                                        <td>
                                            <div class="d-flex">
                                                @if($items['section_id'] == 7)
                                                <a href="{{ route('edit_careers', ['id' => $items['section_id']]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                @else
                                                <a id="getUser" data-url="{{ route('edit_contact_details',['id'=>$items['section_id']])}}" class="btn btn-primary shadow btn-xs sharp me-1 edit_user" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pencil-alt"></i></a>
                                                @endif
                                               <!-- <a class="btn btn-danger shadow btn-xs sharp delete_user" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash"></i></a> -->
                                            </div>                                              
                                        </td>                                               
                                    </tr>
                                   @endforeach 
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
    <!-- Your existing edit modal content -->
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('update_contact_details') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                         <div id="dynamic-content"></div>
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
    <!-- Your existing delete modal content -->
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete User</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('delete_contact_details') }}" method="POST">
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
    <script src="{{ URL::to('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).on('click', '#getUser', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            $('#dynamic-content').html(''); // Clear the content before making an Ajax call

            $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#dynamic-content').html('');
                    $('#dynamic-content').html(data); // Load the response

                    // Initialize CKEditor on the dynamically loaded content
                    $('#dynamic-content').find('textarea.ckeditor').each(function() {
                        CKEDITOR.replace(this);
                    });

                    // Optional: Handle CKEditor instances inside a Bootstrap modal
                    $('#dynamic-content').find('.modal').on('show.bs.modal', function(e) {
                        var modalContent = $(this).find('.modal-body');
                        modalContent.find('textarea.ckeditor').each(function() {
                            CKEDITOR.replace(this);
                        });
                    });

                    // $('#modal-loader').hide(); // Hide the Ajax loader
                })
                .fail(function() {
                    $('#dynamic-content').html(
                        '<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...'
                    );
                    // $('#modal-loader').hide();
                });
        });
    </script>

    // <script type="text/javascript">
       
    //     $(document).on('click', '#getUser', function(e) {
    //         e.preventDefault();
    //         var url = $(this).data('url');
    //         $('#dynamic-content').html(''); // leave it blank before ajax call
    //         // $('#modal-loader').show();      // load ajax loader

    //         $.ajax({
    //             url: url,
    //             type: 'GET',
    //             dataType: 'html'
    //         })
    //         .done(function(data) {
    //             console.log(data);
    //             $('#dynamic-content').html('');
    //             $('#dynamic-content').html(data); // load response 
    //             // $('#modal-loader').hide();        // hide ajax loader   
    //         })
    //         .fail(function() {
    //             $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
    //             // $('#modal-loader').hide();
    //         });

    //     });

    // </script>
    

    {{-- delete user --}}
    <script>
        $(document).on('click', '.delete_user', function() {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.section_id').text());
        });
    </script>
@endsection
@endsection
