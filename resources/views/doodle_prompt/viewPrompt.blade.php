@extends('layouts.master')
@section('title', 'Prompt Details')
@section('content')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('event_info') }}">Prompt Details</a></li>
            </ol>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Prompt List</h4>
                        <span style="float: right;"><a href="{{ route('add_prompt') }}"><button class="btn btn-primary">Add Prompt</button></a></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Prompt Name</th>
                                        <th>Color Code</th>
                                        <th>Prompt Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                 @foreach($prompt_data as $items)
                                    <input type="hidden" class="section_id" value="{{$items->id}}">
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td class="name">{{ $items->name }}</td>
                                        <td class="user_id">{{ $items->color }}</td>
                                        <td class="name">{{ $items->text }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a id="getUser" data-url="{{ route('edit_promptInfo',['id'=>$items->id])}}" class="btn btn-primary shadow btn-xs sharp me-1 edit_user" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger shadow btn-xs sharp delete_user" onclick="deleteRecord({{$items->id}})" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash"></i></a>
                                            </div>                                              
                                        </td>                                               
                                    </tr>
                                     <?php $i++;?>
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
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('update_promptInfo') }}" method="post" enctype="multipart/form-data">
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete User</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('deletePromptRecord') }}" method="POST">
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
    <script type="text/javascript">
       
  $(document).on('click', '#getUser', function(e){

        e.preventDefault();

        var url = $(this).data('url');

        $('#dynamic-content').html(''); // leave it blank before ajax call
       // $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data);  
            $('#dynamic-content').html('');    
            $('#dynamic-content').html(data); // load response 
           // $('#modal-loader').hide();        // hide ajax loader   
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

    });

    </script>


    {{-- delete user --}}
    <script>
        function deleteRecord(id)
        {
            // alert(id);
            $('#e_id').val(id);
        }
//         $(document).on('click','.delete_user',function()
//         {
//             $('input[type="hidden"].section_id').each(function () {

//                 var $event_id =$(this).val();
//                 alert($event_id);
//             $('#e_id').val($event_id);
// });
            
//         });
    </script>


@endsection
@endsection
