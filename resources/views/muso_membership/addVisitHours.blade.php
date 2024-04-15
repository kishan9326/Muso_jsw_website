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
                             <form action="{{ route('addVisitHoursData') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Muso Galleries and exibitions</label>
                                        <input type="text" placeholder="Muso Galleries and exibitions" class="form-control" name="muso_gallery">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Subko counter</label>
                                        <input type="text" placeholder="Subko counter" class="form-control" name="subko_counter">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Library</label>
                                        <input type="text" placeholder="Library" class="form-control" name="library">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">The Shop</label>
                                        <input type="text" placeholder="The Shop" class="form-control" name="the_shop">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Subko Cafe</label>
                                        <input type="text" placeholder="Subko Cafe" class="form-control" name="subko_cafe">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Recycling Center</label>
                                        <input type="text" placeholder="Recycling Center" class="form-control" name="recycling_center">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">The Commons</label>
                                        <input type="text" placeholder="The Commons" class="form-control" name="the_commons">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Immersive Gallery</label>
                                        <input type="text" placeholder="Immersive Gallery" class="form-control" name="immersive_gallery">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Parking garage</label>
                                        <input type="text" placeholder="Parking garage" class="form-control" name="parking_garage">
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
