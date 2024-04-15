<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // index page
    public function index()
    {
        return view('contact.add_contact_details');
        // $user_table = User::all();
        // return view ('usermanagement.usertable',compact('user_table'));
    }

    public function addContactContent(Request $request)
    {
        // print_r($request->all());
        // exit();
        DB::beginTransaction();
        try {

            // $values = [
            //      'section_id' => $request->section_id,
            //      'title' => $request->title,
            //      'text' => $request->content
            // ];

            if ($request->section_id == 1) {
                $values = [
                    'section_id' => $request->section_id,
                    'office_time' => $request->time,
                ];
                // print_r($values);
                // exit();
                DB::table('contact_page_details')->insert($values);
            } else if ($request->section_id == 7) {
                $values = [
                    'section_id' => $request->section_id,
                ];
                DB::table('contact_page_details')->insert($values);
                $values = [
                    'section_id' => $request->section_id,
                    'career' => $request->carrers,
                    'work_with' => $request->work,
                    'volunteer' => $request->volunteer,
                ];

                // print_r($values);
                // exit();

                DB::table('contact_content')->insert($values);
            } else {
                $values = [
                    'section_id' => $request->section_id,
                    'mobile' => $request->number,
                    'email' => $request->email_id,
                ];

                DB::table('contact_page_details')->insert($values);
            }

            //$input=$request->all();
            //$images=array();

            // DB::table('about_content')->insert($values);
            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->back();
        }
    }

    // public function edit_contact($id)
    // {

    //     $data = DB::table('contact_page_details')->select('*')->where('section_id', '=', $id)->distinct()
    //         ->get()->toArray();
    //     //$img_name1 = [];
    //     $final_array = [];

    //     // echo(count($data));

    //     // echo $data[$i]->section_id;
    //     //  $query =  DB::table('about_assets');
    //     //  $query->where('section_id', $data[0]->section_id);
    //     //  $rows = $query->get()->toArray();
    //     //  $img_name1 = [];
    //     // // $data_img = [];
    //     //$data_img['text'] = $data[0]->text;
    //     $data_img['title'] = $data[0]->title;
    //     $data_img['office_time'] = $data[0]->office_time;
    //     $data_img['mobile'] = $data[0]->mobile;
    //     $data_img['email'] = $data[0]->email;
    //     $data_img['section_id'] = $data[0]->section_id;

    //     //   foreach($rows as $imgName)
    //     //   {

    //     //      $img_name1[] = $imgName->img_name;
    //     //      $img_id[] = $imgName->id;
    //     //      $data_img['img_id'] =$img_id;
    //     //      $data_img['img_name'] =$img_name1;
    //     //   }

    //     // print_r($data_img);
    //     // exit();
    //     // $result = $rows->toArray();

    //     // $img_name[] = $rows[$i]->img_name;
    //     // $final_array[] = $data_img;

    //     if ($id == 1) {

    //         $html = '<div class="row">
    //                                 <div class="mb-3 col-md-6">
    //                                  <label class="form-label">' . $data_img['title'] . '</label>
    //                                  </div>
    //                                  </div>
    //                                 <div class="row">
    //                                 <div class="mb-3 col-md-6">
    //                                  <label class="form-label">Office Time</label>
    //                                   <input type="hidden" placeholder="Name" class="form-control" id="section_id" name="section_id" value="' . $data_img['section_id'] . '">
    //                                     <input type="text" placeholder="Name" class="form-control" id="title" name="office_time" value="' . $data_img['office_time'] . '" required>
    //                                 </div>
    //                                 </div>';

    //         // $html = "<h1>".$data__img['text']."</h1>";
    //         return $html;
    //     } else if ($id == 7) {
    //         $query = DB::table('contact_content');
    //         $query->where('section_id', $id);
    //         $rows = $query->get()->toArray();

    //         $data_img['career'] = $rows[0]->career;
    //         $data_img['work_with'] = $rows[0]->work_with;
    //         $data_img['volunteer'] = $rows[0]->volunteer;
    //         $data_img['section_id'] = $rows[0]->section_id;

    //         $html = '<div class="row">
    //                     <div class="mb-3 col-md-12">
    //                     <label class="form-label">Carrers</label>
    //                     <input type="hidden" placeholder="Name" class="form-control" id="section_id" name="section_id" value="' . $data_img['section_id'] . '" >
    //                     <textarea type="text" placeholder="Content" id="content" class="form-control" name="career" >' . $data_img['career'] . '</textarea>
    //                     </div>


    //                     <div class="row">
    //                     <div class="mb-3 col-md-12">
    //                     <label class="form-label">Work sith us</label>
    //                     <textarea type="text" placeholder="Content" id="content" class="form-control" name="work_with" >' . $data_img['work_with'] . '</textarea>
    //                     </div>
    //                     </div>

    //                     <div class="row">
    //                     <div class="mb-3 col-md-12">
    //                     <label class="form-label">Volunteer with us</label>
    //                     <textarea type="text" placeholder="Content" id="volunteer" class="form-control" name="volunteer" >' . $data_img['volunteer'] . '</textarea>
    //                     </div>
    //                     </div>

    //                     ';

    //         // $html = "<h1>".$data__img['text']."</h1>";
    //         return $html;
    //     } else {
    //         $html = '<div class="row">
    //             <div class="mb-3 col-md-6">
    //             <label class="form-label">' . $data_img['title'] . '</label>
    //             </div>
    //             </div>
    //             <div class="row">
    //             <div class="mb-3 col-md-6">
    //             <label class="form-label">Contact</label>
    //             <input type="hidden" placeholder="Name" class="form-control" id="section_id" name="section_id" value="' . $data_img['section_id'] . '">
    //             <input type="text" placeholder="Name" class="form-control" id="title" name="mobile" value="' . $data_img['mobile'] . '" >
    //             </div>
    //             </div>

    //             <div class="row">
    //             <div class="mb-3 col-md-6">
    //             <label class="form-label">Email Id</label>
    //             <input type="text" placeholder="Name" class="form-control" id="title" name="email_id" value="' . $data_img['email'] . '" >
    //             </div>
    //             </div>';

    //         return $html;
    //     }

    // }
    
      public function edit_contact($id)
    {

        $data = DB::table('contact_page_details')->select('*')->where('section_id', '=', $id)->distinct()
            ->get()->toArray();
        //$img_name1 = [];
        $final_array = [];

        // echo(count($data));

        // echo $data[$i]->section_id;
        //  $query =  DB::table('about_assets');
        //  $query->where('section_id', $data[0]->section_id);
        //  $rows = $query->get()->toArray();
        //  $img_name1 = [];
        // // $data_img = [];
        //$data_img['text'] = $data[0]->text;
        $data_img['title'] = $data[0]->title;
        $data_img['office_time'] = $data[0]->office_time;
        $data_img['mobile'] = $data[0]->mobile;
        $data_img['email'] = $data[0]->email;
        $data_img['section_id'] = $data[0]->section_id;


        if ($id == 1) {

            $html = '<div class="row">
                                    <div class="mb-3 col-md-12">
                                     <label class="form-label">' . $data_img['title'] . '</label>
                                     </div>
                                     </div>
                                    <div class="row">
                                    <div class="mb-3 col-md-12">
                                     <label class="form-label">Office Time</label>
                                      <input type="hidden" placeholder="Name" class="form-control" id="section_id" name="section_id" value="' . $data_img['section_id'] . '">
                                        
                                     <textarea type="text" placeholder="Name" class="form-control ckeditor" id="title" name="office_time" >' . $data_img['office_time'] . '</textarea>
                                    </div>
                                    </div>';

            // $html = "<h1>".$data__img['text']."</h1>";
            return $html;
        } else if ($id == 7) {
            $query = DB::table('contact_content');
            $query->where('section_id', $id);
            $rows = $query->get()->toArray();

            $data_img['career'] = $rows[0]->career;
            $data_img['work_with'] = $rows[0]->work_with;
            $data_img['volunteer'] = $rows[0]->volunteer;
            $data_img['section_id'] = $rows[0]->section_id;



            // $final_array[] = $data_img;
            return view("contact.edit_careers", ["data_img" => $data_img]);

            // $html = '<div class="row">
            //             <div class="mb-3 col-md-12">
            //             <label class="form-label">Carrers</label>
            //             <input type="hidden" placeholder="Name" class="form-control" id="section_id" name="section_id" value="' . $data_img['section_id'] . '" >
            //             <textarea type="text" placeholder="Content" id="content" class="form-control" name="career" >' . $data_img['career'] . '</textarea>
            //             </div>


            //             <div class="row">
            //             <div class="mb-3 col-md-12">
            //             <label class="form-label">Work sith us</label>
            //             <textarea type="text" placeholder="Content" id="content" class="form-control" name="work_with" >' . $data_img['work_with'] . '</textarea>
            //             </div>
            //             </div>

            //             <div class="row">
            //             <div class="mb-3 col-md-12">
            //             <label class="form-label">Volunteer with us</label>
            //             <textarea type="text" placeholder="Content" id="volunteer" class="form-control" name="volunteer" >' . $data_img['volunteer'] . '</textarea>
            //             </div>
            //             </div>

            //             ';

            // // $html = "<h1>".$data__img['text']."</h1>";
            // return $html;
        } else {
            $html = '<div class="row">
                <div class="mb-3 col-md-12">
                <label class="form-label">' . $data_img['title'] . '</label>
                </div>
                </div>
                <div class="row">
                <div class="mb-3 col-md-12">
                <label class="form-label">Contact</label>
                <input type="hidden" placeholder="Name" class="form-control" id="section_id" name="section_id" value="' . $data_img['section_id'] . '">
                
             <textarea type="text" placeholder="Name" class="form-control ckeditor" id="title" name="mobile" >' . $data_img['mobile'] . '</textarea>
                </div>
                </div>

                <div class="row">
                <div class="mb-3 col-md-12">
                <label class="form-label">Email Id</label>
                
               
                 <input type="text" placeholder="Name" class="form-control" id="title" name="email_id" value="' . $data_img['email'] . '" >
                </div>
                </div>';

            return $html;
             // <textarea type="text" placeholder="Name" class="form-control ckeditor" id="title" name="email_id" >' . $data_img['email'] . '</textarea>
        }

    }

    public function update_contact_details(Request $request)
    {

        DB::beginTransaction();
        try {
            // $this->validate($request, [
            //     'office_time' => 'required',
            //     'career' => 'required',
            //     'work_with' => 'required',
            //     'volunteer' => 'required',
            //     'mobile' => 'required',
            //     'email_id' => 'required',
            // ]);
            if ($request->section_id == 1) {
                $values = [
                    'office_time' => $request->office_time,
                ];
                DB::table('contact_page_details')->where('section_id', $request->section_id)->update($values);
            } else if ($request->section_id == 7) {
                $values = [
                    'career' => $request->career,
                    'work_with' => $request->work_with,
                    'volunteer' => $request->volunteer,
                ];
                DB::table('contact_content')->where('section_id', $request->section_id)->update($values);
            } else {
                $values = [
                    'mobile' => $request->mobile,
                    'email' => $request->email_id,
                ];
                DB::table('contact_page_details')->where('section_id', $request->section_id)->update($values);
            }

            Toastr::success('Update data successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            // Toastr::error('fail, User Update :)', 'Error');
              Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function getContactList()
    {
        $data = DB::table('contact_page_details')->select('*')->distinct()
            ->get()->toArray();
        //$img_name1 = [];
        $final_array = [];
        // print_r($data);
        // exit();
        // echo(count($data));
        for ($i = 0; $i < count($data); $i++) {
            //$data_img = [];

            // echo $data[$i]->section_id;
            if ($data[$i]->section_id == 7) {
                $query = DB::table('contact_content');
                $query->where('section_id', $data[$i]->section_id);
                $rows = $query->get()->toArray();
                //$query->where('section_id', $data[$i]->section_id);

                $data_img['title'] = $data[$i]->title;
                $data_img['office_time'] = '';
                $data_img['mobile'] = '';
                $data_img['email'] = '';
                $data_img['section_id'] = $rows[0]->section_id;
                $data_img['career'] = $rows[0]->career;
                $data_img['work_with'] = $rows[0]->work_with;
                $data_img['volunteer'] = $rows[0]->volunteer;

            } else {

                //$img_name1[] = $imgName->img_name;
                $data_img['section_id'] = $data[$i]->section_id;
                $data_img['title'] = $data[$i]->title;
                $data_img['office_time'] = $data[$i]->office_time;
                $data_img['mobile'] = $data[$i]->mobile;
                $data_img['email'] = $data[$i]->email;
            }

            // $result = $rows->toArray();

            // $img_name[] = $rows[$i]->img_name;
            $final_array[] = $data_img;

        }
        //print_r($final_array);

        return view("contact.view_contact_details", ["data" => $final_array]);
    }
    // /** delete record */
    public function deleteRecord(Request $request)
    {
        try {

            if ($request->id == 7) {
                DB::table('contact_page_details')->where('section_id', $request->id)->delete();
                DB::table('contact_content')->where('section_id', $request->id)->delete();
            } else {
                DB::table('contact_page_details')->where('section_id', $request->id)->delete();

            }
            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }
    }

    public function getContactData()
    {
        $data = DB::table('contact_page_details')->select('*')->distinct()
            ->get()->toArray();
        //$img_name1 = [];
        $final_array = [];
        // print_r($data);
        // exit();
        // echo(count($data));
        for ($i = 0; $i < count($data); $i++) {
            //$data_img = [];

            // echo $data[$i]->section_id;
            if ($data[$i]->section_id == 7) {
                $query = DB::table('contact_content');
                $query->where('section_id', $data[$i]->section_id);
                $rows = $query->get()->toArray();
                //$query->where('section_id', $data[$i]->section_id);

                $data_img['title'] = $data[$i]->title;
                $data_img['office_time'] = '';
                $data_img['mobile'] = '';
                $data_img['email'] = '';
                $data_img['section_id'] = $rows[0]->section_id;
                $data_img['career'] = $rows[0]->career;
                $data_img['work_with'] = $rows[0]->work_with;
                $data_img['volunteer'] = $rows[0]->volunteer;

            } else {

                //$img_name1[] = $imgName->img_name;
                $data_img['section_id'] = $data[$i]->section_id;
                $data_img['title'] = $data[$i]->title;
                $data_img['office_time'] = $data[$i]->office_time;
                $data_img['mobile'] = $data[$i]->mobile;
                $data_img['email'] = $data[$i]->email;
                //  $data_img['email'] = '<a href="mailto:' . $data[$i]->email . '">' . $data[$i]->email . '</a>';
            }

            // $result = $rows->toArray();

            // $img_name[] = $rows[$i]->img_name;
            $final_array[] = $data_img;

        }
        //print_r($final_array);

        $response_array = ['success' => true, 'data' => $final_array];

        // print_r($response_array['data'][1]['img_name'][1]);
        // exit();

        return response()->json($response_array, 200);
    }

    public function bookingRequest(Request $request)
    {
        date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
        $ldate = date('d-m-Y H:i:s');

        $values = [

            'name' => $request->name,
            'email' => $request->email,
            'time' => $ldate,
        ];

        DB::table('booking_details')->insert($values);

        $response_array = ['success' => true, 'messsage' => 'Data save successfully'];
        return response()->json($response_array, 200);
        //print_r($request->all());
    }

    public function getBookingDetails()
    {
         $booking_details = DB::table('visit_bookings')->select('*')->distinct()->orderBy('id', 'DESC')
            ->get()->toArray();

        return view('bookings.visit_page', array('booking_details' => $booking_details));    }

    // /** profile user */
    // public function profileUser() {
    //     return view('usermanagement.userprofile');
    // }
}
