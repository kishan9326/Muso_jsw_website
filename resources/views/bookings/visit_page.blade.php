@extends('layouts.master')

@section('title', 'Visit Page Booking Details')
@section('content')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('event_info') }}">Visit Page Booking Details</a></li>
            </ol>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th style="padding-left: 10px;">Names</th>
                                        <th style="padding-left: 10px;">Email</th>
                                        <th style="padding-left: 10px;">Phone</th>
                                        <th style="padding-left: 10px;">Child Tickets</th>
                                        <th >Adult Tickets</th>
                                        <th >Ticket Type</th>
                                        <th >Time Slot</th>
                                        <th style="padding-left: 10px;">Visit Date</th>
                                        <th style="padding-left: 10px;">Grand Total</th>
                                        <th style="padding-left: 10px;">Payment Status</th>
                                        <th style="padding-left: 10px;">Booking Id</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                 @foreach($booking_details as $items)
                                    <input type="hidden" class="section_id" value="{{$items->id}}">
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="padding-left: 10px;" class="name">{{ $items->Names }}</td>
                                        <td style="padding-left: 10px;" class="user_id">{{ $items->Email }}</td>
                                        <td style="padding-left: 10px;" class="name">{{ $items->Phone_Number }}</td>
                                        <td style="padding-left: 10px;" class="name">{{ $items->Child_Tickets }}</td>
                                        <td class="name">{{ $items->Adult_Tickets }}</td>
                                        <td class="name">{{ $items->Ticket_Type }}</td>
                                        <td class="name">{{ $items->Slot_From_Sites }}</td>
                                        <td style="padding-left: 10px;" class="name">{{ $items->Date_field }}</td>
                                        <td style="padding-left: 10px;" class="name">{{ $items->Grand_Total }}</td>
                                        <td style="padding-left: 10px;" class="name">{{ $items->payment_status }}</td>
                                        <td style="padding-left: 10px;" class="name">{{ $items->refernce_id }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <!-- <a id="getUser" data-url="{{ route('edit_promptInfo',['id'=>$items->id])}}" class="btn btn-primary shadow btn-xs sharp me-1 edit_user" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pencil-alt"></i></a> -->
                                                <!-- <a class="btn btn-danger shadow btn-xs sharp delete_user" onclick="deleteRecord({{$items->id}})" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash"></i></a> -->
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



<!-- Delete User Modal -->
<!-- <div class="modal custom-modal fade" id="delete_user" role="dialog">
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
</div> -->
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




@endsection
@endsection
