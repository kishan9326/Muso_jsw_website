<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class MusoMembershipController extends Controller
{
    // index page
    public function index()
    {
        return view('muso_membership.addMembership');
        // $user_table = User::all();
        // return view ('usermanagement.usertable',compact('user_table'));
    }

    public function addMemberhipData(Request $request)
    {
        DB::beginTransaction();
        // print_r($request->all());
        // exit();
        try {
            $this->validate($request, [
                'terms_condition' => 'required',
                'price' => 'required',
                'tag_line' => 'required',
            ]);
            // print_r($request->all());
            // exit();
            if ($request->number) {
                for ($i = 0; $i <= $request->number; $i++) {

                    if (isset($request['id'][$i])) {

                        $values = [
                            'terms_condition' => $request['terms_condition'][$i],
                        ];
                        DB::table('muso_membership_details')->where('id', $request['id'][$i])->update($values);
                    } else {
                        $values2 = [
                            'membership_id' => $request->membership_id,
                            'terms_condition' => $request['terms_condition'][$i],
                        ];
                        DB::table('muso_membership_details')->insert($values2);
                    }
                }

                $values = [
                    'membership_id' => $request->membership_id,
                    'price_text' => $request->price,
                    'tag_line' => $request->tag_line,
                ];
                DB::table('muso_membership')->where('membership_id', $request->membership_id)->update($values);
            } else {
                $values = [
                    'membership_id' => $request->membership_id,
                    'price_text' => $request->price,
                    'tag_line' => $request->tag_line,

                ];

                foreach ($request->addName as $value) {
                    $values1 = [
                        'membership_id' => $request->membership_id,
                        'terms_condition' => $value,
                    ];

                    DB::table('muso_membership_details')->insert($values1);
                }

                DB::table('muso_membership')->insert($values);
            }

            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->route('getMemberShipData');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->route('getMemberShipData');
        }

    }

    public function getMemberShipData()
    {
        $membership_data = DB::table('muso_membership')->select('*')->distinct()
            ->get()->toArray();

        return view('muso_membership.viewMembership', array('membership_data' => $membership_data));
    }

    public function edit_membership($id)
    {
        $data = DB::table('muso_membership')->select('*')->where('membership_id', '=', $id)->distinct()
            ->get()->toArray();
        //$img_name1 = [];

        $points = DB::table('muso_membership_details')->select('*')->where('membership_id', '=', $id)->distinct()
            ->get()->toArray();

        return view('muso_membership.editMembership', array('membership_data' => $data, 'points' => $points));
    }

    public function deleteMembershipDetails(Request $request)
    {
        try {

            DB::table('muso_membership_details')->where('id', $request->myData)->delete();

            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }
    }

    public function delete_record(Request $request)
    {
        try {

            DB::table('muso_membership')->where('id', $request->id)->delete();

            DB::table('muso_membership_details')->where('membership_id', $request->id)->delete();

            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }
    }

    public function addSchoolEventData(Request $request)
    {

        // echo '<pre>';
        // print_r($request->all());
        // exit();
        try {

            $this->validate($request, [
                'content' => 'required',
            ]);

            if ($request->event_id) {

                if ($files = $request->file('img_1')) {
                    $name = $files->getClientOriginalName();
                    // $file->move('public/image',$name);
                    $files->move(public_path() . '/uploads/', $name);
                    //$images[]=$name;
                    $images[] = $name;
                } else {
                    $images[] = $request->img_name1;
                }

                if ($files = $request->file('img_2')) {
                    $name = $files->getClientOriginalName();
                    // $file->move('public/image',$name);
                    $files->move(public_path() . '/uploads/', $name);
                    //$images[]=$name;
                    $images[] = $name;
                } else {
                    $images[] = $request->img_name2;
                }

                if ($files = $request->file('img_3')) {
                    $name = $files->getClientOriginalName();
                    // $file->move('public/image',$name);
                    $files->move(public_path() . '/uploads/', $name);
                    //$images[]=$name;
                    $images[] = $name;
                } else {
                    $images[] = $request->img_name3;
                }
                // print_r($images);
                // exit();

                $image = implode(',', $images);
                $values = [
                    'content' => $request->content,
                    'img_name' => $image,
                ];

                DB::table('school_event')->where('id', '=', $request->event_id)->update($values);
            } else {
                if ($files = $request->file('event_img')) {
                    foreach ($files as $file) {
                        $name = $file->getClientOriginalName();
                        // $file->move('public/image',$name);
                        $file->move(public_path() . '/uploads/', $name);
                        //$images[]=$name;
                        $images[] = $name;
                    }
                }
                $image = implode(',', $images);
                $values = [
                    'content' => $request->content,
                    'img_name' => $image,
                ];

                DB::table('school_event')->insert($values);
            }

            Toastr::success('Successfull :)', 'Success');
            return redirect()->route('schoolEvent');

        } catch (\Exception $e) {

            DB::rollback();
            // Toastr::error('User delete fail :)', 'Error');
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            // return redirect()->route('schoolEvent');
            return back();
        }

    }

    public function schoolEvent(Request $request)
    {
        $membership_data = DB::table('school_event')->select('*')->distinct()
            ->get()->toArray();

        return view('muso_membership.viewSchool_event', array('membership_data' => $membership_data));
    }

    public function edit_schoolEvent($id)
    {
        $membership_data = DB::table('school_event')->select('*')->where('id', '=', $id)->distinct()
            ->get()->toArray();

        // return view('muso_membership.edit_school_event', array('childrens_panel' => $childrens_panel, 'event_assets' => $event_assets));
        return view('muso_membership.edit_school_event', ['membership_data' => $membership_data]);

        // $images = explode(',', $membership_data[0]->img_name);

        // foreach($images as $image)
        // {
        //     $final_image[] = $image;
        // }

        //     $html = '<div class="row">
        //     <div class="mb-3 col-md-6">
        //     <label class="form-label">Content</label>
        //     <input type="hidden" placeholder="Name" class="form-control" name="event_id" value="'.$membership_data[0]->id.'">
        //     <textarea type="text"required placeholder="Event Content" class="form-control" name="content">'.$membership_data[0]->content.'</textarea>
        //     </div>
        //     </div>
        //     <div class="row">
        //                 <div class="mb-3 col-md-12">
        //                 <input type="hidden" name="img_name1" class="form-control" placeholder="" value="'.$final_image[0].'">
        //                 <input type="file" name="img_1" class="form-control" placeholder=""><br>
        //                 <img src="'.url('/').'/uploads/'.$final_image[0].'" height="70" width="70">
        //     </div>
        //     </div>
        //                 <div class="row">
        //                 <div class="mb-3 col-md-12">
        //                 <input type="hidden" name="img_name2" class="form-control" placeholder="" value="'.$final_image[1].'">
        //                 <input type="file" name="img_2" class="form-control" placeholder=""><br>
        //                 <img src="'.url('/').'/uploads/'.$final_image[1].'" height="70" width="70">
        //     </div>
        //     </div>
        //                 <div class="row">
        //                 <div class="mb-3 col-md-12">
        //                 <input type="hidden" name="img_name3" class="form-control" placeholder="" value="'.$final_image[2].'">
        //                 <input type="file" name="img_3" class="form-control" placeholder="" ><br>
        //                 <img src="'.url('/').'/uploads/'.$final_image[2].'" height="70" width="70">
        //     </div>
        //     </div>
        //     ';

        // return $html;
    }

    public function addVisitHours()
    {
        return view('muso_membership.addVisitHours');
    }

    public function addVisitHoursData(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'muso_gallery' => 'required',
                'subko_counter' => 'required',
                'library' => 'required',
                'the_shop' => 'required',
                'subko_cafe' => 'required',
                'recycling_center' => 'required',
                'the_commons' => 'required',
                'immersive_gallery' => 'required',
                'parking_garage' => 'required',
            ]);

            if ($request->updateHistory) {
                $values = [
                    'muso_galleries' => $request->muso_gallery,
                    'subko_counter' => $request->subko_counter,
                    'library' => $request->library,
                    'the_shop' => $request->the_shop,
                    'subko_cafe' => $request->subko_cafe,
                    'recycling_center' => $request->recycling_center,
                    'the_commons' => $request->the_commons,
                    'immersive_gallery' => $request->immersive_gallery,
                    'parking_garage' => $request->parking_garage,
                ];
                DB::table('visit_hours')->where('id', '=', $request->updateHistory)->update($values);
                DB::commit();
            } else {
                $values = [
                    'muso_galleries' => $request->muso_gallery,
                    'subko_counter' => $request->subko_counter,
                    'library' => $request->library,
                    'the_shop' => $request->the_shop,
                    'subko_cafe' => $request->subko_cafe,
                    'recycling_center' => $request->recycling_center,
                    'the_commons' => $request->the_commons,
                    'immersive_gallery' => $request->immersive_gallery,
                    'parking_garage' => $request->parking_garage,
                ];
                DB::table('visit_hours')->insert($values);
                DB::commit();
            }

            Toastr::success('Add data successfully :)', 'Success');

            return redirect()->route('viewVisit_hours');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->route('event_info');
        }
    }

    public function viewVisit_hours()
    {
        $visit_hours = DB::table('visit_hours')->select('*')->distinct()
            ->get()->toArray();
        return view('muso_membership.viewHours', array('visit_hours' => $visit_hours));
    }

    public function deletVisitHoursRecord(Request $request)
    {
        try {

            DB::table('visit_hours')->where('id', $request->id)->delete();

            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }
    }

    public function get_musoMembership_data()
    {
        $final_array = [];
        $muso_membership = DB::table('muso_membership')->select('*')->distinct()
            ->get()->toArray();
        $data_member = [];
        //$points_array = [];
        foreach ($muso_membership as $muso_membership_data) {
            $data_member['price_text'] = $muso_membership_data->price_text;
            $data_member['tag_line'] = $muso_membership_data->tag_line;
            //print_r($muso_membership_data->price_text);
            //     for($i = 0;  $i < count($muso_membership); $i++)
            // {
            $points_array = [];
            $muso_membership_points = DB::table('muso_membership_details')->select('terms_condition')->where('membership_id', '=', $muso_membership_data->membership_id)->distinct()
                ->get()->toArray();
            for ($i = 0; $i < count($muso_membership_points); $i++) {
                //print_r($muso_membership_points[$i]->terms_condition);

                $points_array[] = $muso_membership_points[$i]->terms_condition;

                //$final_array[] = $data_member;
            }
            $data_member['points'] = $points_array;
            $final_array[] = $data_member;
        }

        // $school_event = DB::table('school_event')->select('*')->distinct()
        // ->get()->toArray();

        $school_event = DB::table('school_event')->select('*')->distinct()->get()->toArray();

        foreach ($school_event as &$event) {
            // Split the comma-separated image names into an array
            $imageNames = explode(',', $event->img_name);

            // Initialize an array to store the full asset URLs
            $imageUrls = [];

            // Loop through the image names and generate full URLs
            foreach ($imageNames as $imageName) {
                $imageUrls[] = asset('uploads/' . trim($imageName));
            }

            // Set the img_name field to the array of full URLs
            $event->img_name = $imageUrls;
        }

        $visit_hours = DB::table('visit_hours')->select('*')->distinct()
            ->get()->toArray();

        $response_array = ['success' => true, 'membership_policy' => $final_array, 'school_event' => $school_event, 'visit_hours' => $visit_hours];

        return response()->json($response_array, 200);
    }
    
    
    // ----------------------------------------------------------------------------------------
    // public function view_member_query()
    // {
    //     $members = DB::table('visit_member_form')->get();
    //     return view('muso_membership.view_membership_enquiry', compact('members'));
    // }
    //   public function view_member_query()
    // {
    //       $prompt_data = DB::table('visit_member_form')->select('*')->distinct()
    //     ->get()->toArray();

    //      return view('muso_membership.view_membership_enquiry', array('prompt_data' => $prompt_data));
    // }


    // public function deleteMember(Request $request)
    // {
    //     // print_r($request);
    //     // exit();
    //     DB::table('visit_member_form')->where('id',$request->id)->delete();
    //     return redirect()->route('visitMemberForm')->with('success', 'Member deleted successfully.');
    // }
public function view_member_query()
{
      $prompt_data = DB::table('visit_member_form')->select('*')->distinct()->orderBy('id', 'DESC')
    ->get()->toArray();

     return view('muso_membership.view_membership_enquiry', array('prompt_data' => $prompt_data));
}


   
public function deleteMember(Request $request)
{
    // print_r($request->all());
    //     exit();
    try {

        DB::table('visit_member_form')->where('id', $request->id)->delete();
      
        Toastr::success('User deleted successfully :)','Success');
        return redirect()->back();
    
    } catch(\Exception $e) {

        DB::rollback();
        Toastr::error('User delete fail :)','Error');
        return redirect()->back();
    }
}
public function school_enquiry_details()
{
      $prompt_data = DB::table('visit_school_form')->select('*')->distinct()->orderBy('id', 'DESC')
    ->get()->toArray();

     return view('muso_membership.view_school_enquiry', array('prompt_data' => $prompt_data));
}


   
public function delete_school_enquiry(Request $request)
{
    // print_r($request->all());
    //     exit();

        DB::table('visit_school_form')->where('id', $request->id)->delete();
      
        Toastr::success('User deleted successfully :)','Success');
        return redirect()->back();
    
    
}



}
