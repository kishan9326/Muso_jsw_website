@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Event</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Add Content</a></li>
            </ol>
        </div>
          <div class="row">   
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                             <form action="{{ route('event_orgniserData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Event Name</label>
                                        <input type="text" placeholder="Event Name" class="form-control" name="event_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Event Organiser</label>
                                        <input type="text" placeholder="Event Organiser" class="form-control" name="event_organiser">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                              <label>Select Date: </label>
                                            <div id="datepickerfrom" 
                                                 class="input-group date" 
                                                 data-date-format="dd-mm-yyyy">
                                                <input class="form-control" name="event_date"
                                                       type="text" readonly />
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Time</label>
                                        <input type="text" placeholder="Time" class="form-control" name="event_time">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Venue</label>
                                        <input type="text" placeholder="Venue" class="form-control" name="event_venue">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Audience</label>
                                        <input type="text" placeholder="Audience" class="form-control" name="event_audience">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price</label>
                                        <input type="text" placeholder="Price" class="form-control" name="event_price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Event Info</label>
                                        <input type="text" placeholder="Event Info" class="form-control" name="event_info">
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

@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
            var date = new Date();
date.setDate(date.getDate());
        $("#datepickerfrom").datepicker({ 
             startDate: date
          //OPTIONS
    }).datepicker('update', new Date());
</script>
@endsection
@endsection
