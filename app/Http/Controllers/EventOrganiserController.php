<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class EventOrganiserController extends Controller
{
    // index page
    public function index()
    {
        return view('event_info.addEventInfo');
        // $user_table = User::all();
        // return view ('usermanagement.usertable',compact('user_table'));
    }


    public function getEvent_orgniserData()
    {
          $event_organiser = DB::table('event_organiser')->select('*')->distinct()
        ->get()->toArray();

         return view('event_info.getEventDetails', array('event_organiser' => $event_organiser));
    }


     public function event_orgniserData(Request $request)
    {
       DB::beginTransaction();

        try {
        $values = [
            'event_name' => $request->event_name,
            'event_organiser' => $request->event_organiser,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'event_venue' => $request->event_venue,
            'event_audience' => $request->event_audience,
            'event_price' => $request->event_price,
            'event_info' => $request->event_info
        ];
         DB::table('event_organiser')->insert($values);
         DB::commit();
         Toastr::success('Add data successfully :)','Success');
           
          return redirect()->route('event_info');
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)','Error');
            return redirect()->route('event_info');
        }
    }


    public function edit_eventInfo($id)
    {
         $data = DB::table('event_organiser')->select('*')->where('id','=',$id)->distinct()
        ->get()->toArray();

        // print_r($data);
        // exit();
                $html = '<div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Event Name</label>
                                        <input type="hidden" name="id" value="'.$data[0]->id.'">
                                        <input type="text" placeholder="Event Name" class="form-control" name="event_name" value="'.$data[0]->event_name.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Event Organiser</label>
                                        <input type="text" placeholder="Event Organiser" class="form-control" name="event_organiser" value="'.$data[0]->event_organiser.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                              <label>Select Date: </label>
                                            <div id="datepickerfrom"
                                                 class="input-group date" 
                                                 data-date-format="dd-mm-yyyy">
                                                <input onClick="myFunction();" class="form-control" name="event_date" value="'.$data[0]->event_date.'"
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
                                        <input type="text" placeholder="Time" class="form-control" name="event_time" value="'.$data[0]->event_time.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Venue</label>
                                        <input type="text" placeholder="Venue" class="form-control" name="event_venue" value="'.$data[0]->event_venue.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Audience</label>
                                        <input type="text" placeholder="Audience" class="form-control" name="event_audience" value="'.$data[0]->event_audience.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price</label>
                                        <input type="text" placeholder="Price" class="form-control" name="event_price" value="'.$data[0]->event_price.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Event Info</label>
                                        <input type="text" placeholder="Event Info" class="form-control" name="event_info" value="'.$data[0]->event_info.'">
                                    </div>
                                </div>
                                ';

                return $html;
    }

    public function update_eventInfo(Request $request)
    {
       
       DB::beginTransaction();

        try {
            $this->validate($request, [
                'event_name' => 'required',
                'event_organiser' => 'required',
                'event_date' => 'required',
                'event_time' => 'required',
                'event_venue' => 'required',
                'event_audience' => 'required',
                'event_price' => 'required',
                'event_info' => 'required'
            ]);
        $values = [
            'event_name' => $request->event_name,
            'event_organiser' => $request->event_organiser,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'event_venue' => $request->event_venue,
            'event_audience' => $request->event_audience,
            'event_price' => $request->event_price,
            'event_info' => $request->event_info
        ];

         DB::table('event_organiser')->where('id','=',$request->id)->update($values);
         DB::commit();
         Toastr::success('Add data successfully :)','Success');

           
          return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            // Toastr::error('fail, User Update :)','Error');
            
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }


    public function deleteEventRecord(Request $request)
    {
        try {

            DB::table('event_organiser')->where('id', $request->id)->delete();
          
            Toastr::success('User deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)','Error');
            return redirect()->back();
        }
    }


    public function get_event_orgniser(Request $request)
    {

       // $event_organiser = DB::table('event_organiser')->select('*')->distinct()
       // ->get()->toArray();



        //skip = OFFSET
        $products = DB::table('event_organiser')->skip($request->skip)->take(4)->get(); //get first 10 rows
        //$products = $art->products->skip(10)->take(10)->get(); //get next 10 rows
        $response_array = ['success' => true , 'event_organiser' => $products];

        // print_r($response_array['data'][1]['img_name'][1]);
        // exit();

        return response()->json($response_array , 200);
    }

    // /** profile user */
    // public function profileUser() {
    //     return view('usermanagement.userprofile');
    // }
}
