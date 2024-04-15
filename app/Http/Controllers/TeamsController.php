<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    // index page
    public function index()
    {
        return view('teams.add_teams');
        // $user_table = User::all();
        // return view ('usermanagement.usertable',compact('user_table'));
    }

    public function view_teams_data()
    {

        $childrens_panel = DB::table('childrens_panel')->select('*')->distinct()
            ->get()->toArray();

        $event_assets = DB::table('event_assets')->select('*')->distinct()
            ->get()->toArray();

        $executive_team = DB::table('executive_team')->select('*')->distinct()
            ->get()->toArray();

        $join_us = DB::table('join_us')->select('*')->distinct()
            ->get()->toArray();

        $advisory_board = DB::table('advisory_board')->select('*')->distinct()
            ->get()->toArray();

        $patrons_supporters = DB::table('patrons_supporters')->select('*')->distinct()
            ->get()->toArray();

        $consultants = DB::table('consultants')->select('*')->distinct()
            ->get()->toArray();

        // print_r($response_array['data'][1]['img_name'][1]);
        // exit();

        return view('teams.view_teams', array('childrens_panel' => $childrens_panel, 'event_assets' => $event_assets, 'executive_team' => $executive_team, 'patrons_supporters' => $patrons_supporters, 'join_us' => $join_us, 'advisory_board' => $advisory_board, 'consultants' => $consultants));
    }

    public function edit_teamsFirstSection()
    {
        $childrens_panel = DB::table('childrens_panel')->select('*')->distinct()
            ->get()->toArray();

        $event_assets = DB::table('event_assets')->select('*')->distinct()
            ->get()->toArray();

        return view('teams.edit_teamsFirst', array('childrens_panel' => $childrens_panel, 'event_assets' => $event_assets));
    }

    public function edit_teamsExecutive()
    {
        $executive_team = DB::table('executive_team')->select('*')->distinct()
            ->get()->toArray();

        $event_assets = DB::table('event_assets')->select('*')->where('section_id', '=', '2')->distinct()
            ->get()->toArray();

        return view('teams.edit_teamsExecutivet', array('executive_team' => $executive_team, 'event_assets' => $event_assets));
    }

    public function edit_teamsJoinUs()
    {
        $join_us = DB::table('join_us')->select('*')->distinct()
            ->get()->toArray();

        return view('teams.edit_teamsJoinUs', array('join_us' => $join_us));
    }

    public function edit_teamsAdvisory()
    {
        $advisory_board = DB::table('advisory_board')->select('*')->distinct()
            ->get()->toArray();

        return view('teams.edit_teamsAdvisory', array('advisory_board' => $advisory_board));
    }

    public function edit_teamsPatrons()
    {
        $patrons_supporters = DB::table('patrons_supporters')->select('*')->distinct()
            ->get()->toArray();

        return view('teams.edit_teamsPatrons', array('patrons_supporters' => $patrons_supporters));
    }

    public function edit_consultants()
    {
        $consultants = DB::table('consultants')->select('*')->distinct()
            ->get()->toArray();

        return view('teams.edit_teamsConsultants', array('consultants' => $consultants));
    }

    public function event_info()
    {
        return view('event_info.addEventInfo');
    }

    public function add_teams(Request $request)
    {

        DB::beginTransaction();
      
        // echo '<pre>';
        //             print_r($request->all());
        //             exit();

        try {
            $this->validate($request, [
                'addName' => 'required',
                'event_content' => 'required'
                // 'content2' => 'required'
            ]);

            if ($request->number) {

                if ($file = $request->file('child_img')) {
                    $name = $file->getClientOriginalName();
                    $nameWithoutSpaces = str_replace(' ', '_', $name);
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $nameWithoutSpaces);
                    //$images[]=$name;
                    $values1 = [
                        //'section_id' => $request->section_id,
                        'img_name' => $nameWithoutSpaces,
                    ];
                    // print_r($values1);
                    // exit();
                    DB::table('event_assets')->where('section_id', '1')->update($values1);
                }

                $members_name = implode(',', $request->addName);
                $values = [
                    'members' => $members_name,
                    'content' => $request->event_content,
                ];

                // print_r($values);
                // exit();

                DB::table('childrens_panel')->where('id', $request->id)->update($values);
                DB::commit();
            } else {
                if ($file = $request->file('child_img')) {
                    $name = $file->getClientOriginalName();
                    $nameWithoutSpaces = str_replace(' ', '_', $name);
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $nameWithoutSpaces);
                    //$images[]=$name;
                    $values1 = [
                        'section_id' => $request->section_id,
                        'img_name' => $nameWithoutSpaces,
                    ];
                    // print_r($values1);
                    // exit();
                    DB::table('event_assets')->insert($values1);
                }

                $members_name = implode(',', $request->addName);
                $values = [
                    'members' => $members_name,
                    'content' => $request->event_content,
                ];

                // print_r($values);
                // exit();

                DB::table('childrens_panel')->insert($values);
            }

            Toastr::success('Add data successfully :)', 'Success');

            return redirect()->route('get_teams_details');
        } catch (\Exception $e) {
            DB::rollback();
            // Toastr::error('fail, User Update :)', 'Error');
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->route('get_teams_details');
        }

        // print_r($request->addMoreInputFields);
        // exit();
        // print_r(implode(',', $request->addMoreInputFields));
        // foreach ($request->addMoreInputFields as $key => $value) {
        //     print_r(implode(',', $value));
        // }
    }

    public function executive_team(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->validate($request, [
                'executive_name' => 'required',
                'designation' => 'required',
                'executive_content' => 'required',
            ]);

            if (isset($request->number1)) {
                // print_r($request->all());
                // exit();
                if ($file = $request->file('executive_img')) {
                    $name = $file->getClientOriginalName();
                    $nameWithoutSpaces = str_replace(' ', '_', $name);
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $nameWithoutSpaces);
                    //$images[]=$name;
                    $values1 = [
                        //'section_id' => $request->section_id,
                        'img_name' => $nameWithoutSpaces,
                    ];
                    // print_r($values1);
                    // exit();
                    DB::table('event_assets')->where('section_id', '2')->update($values1);
                    DB::commit();
                }

                for ($i = 0; $i <= $request->number1; $i++) {
                    if (isset($request['id'][$i])) {

                        $values = [
                            'person_name' => $request['executive_name'][$i],
                            'designation' => $request['designation'][$i],
                            'content' => $request['executive_content'][$i],
                        ];
                        DB::table('executive_team')->where('id', $request['id'][$i])->update($values);
                        DB::commit();
                    } else {
                        $values2 = [
                            'person_name' => $request['executive_name'][$i],
                            'designation' => $request['designation'][$i],
                            'content' => $request['executive_content'][$i],
                        ];
                        DB::table('executive_team')->insert($values2);
                    }
                }
            } else {
                if ($file = $request->file('executive_img')) {
                    $name = $file->getClientOriginalName();
                    $nameWithoutSpaces = str_replace(' ', '_', $name);
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $nameWithoutSpaces);
                    //$images[]=$name;
                    $values1 = [
                        'section_id' => $request->section_id,
                        'img_name' => $nameWithoutSpaces,
                    ];
                    // print_r($values1);
                    // exit();
                    DB::table('event_assets')->insert($values1);
                }

                for ($i = 0; $i < $request->number; $i++) {

                    $values = [
                        'person_name' => $request['executive_name'][$i],
                        'designation' => $request['designation'][$i],
                        'content' => $request['executive_content'][$i],
                    ];

                    //print_r($values);
                    //  exit();
                    DB::table('executive_team')->insert($values);
                    //DB::commit();
                }
            }

            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->route('get_teams_details');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            // Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->route('get_teams_details');
        }
    }

    public function join_us(Request $request)
    {
     
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'join_us' => 'required',
                'jsw_content' => 'required',
            ]);
            // print_r($request->all());
            // exit();
            if ($request->updateJsw) {
                $values = [
                    'join_us' => $request->join_us,
                    'jsw_content' => $request->jsw_content,

                ];

                DB::table('join_us')->where('id', '=', '1')->update($values);

            } else {

                $values = [
                    'join_us' => $request->join_us,
                    'jsw_content' => $request->jsw_content,

                ];
                DB::table('join_us')->insert($values);
            }

            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->route('get_teams_details');
        } catch (\Exception $e) {
            DB::rollback();
            // Toastr::error('fail, User Update :)', 'Error');
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->route('get_teams_details');
        }

    }

    public function advisory_board(Request $request)
    {
     
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'executive_name' => 'required',
                'designation' => 'required',
                'executive_content' => 'required',
            ]);

            if ($request->updateAdvisory) {
                for ($i = 1; $i <= 2; $i++) {
                    $id = $request->id[$i];
                    $values = [
                        'name' => $request->executive_name[$i],
                        'designation' => $request->designation[$i],
                        'content' => $request->executive_content[$i],
                    ];

                    //print_r($values);
                    DB::table('advisory_board')->where('id', '=', $id)->update($values);
                }
            } else {
                for ($i = 1; $i <= 2; $i++) {
                    $values = [
                        'name' => $request->executive_name[$i],
                        'designation' => $request->designation[$i],
                        'content' => $request->executive_content[$i],
                    ];
                    //print_r($values);
                    DB::table('advisory_board')->insert($values);
                }

            }

            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->route('get_teams_details');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->route('get_teams_details');
        }

    }

    public function patrons_supports(Request $request)
    {
      
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'content' => 'required',
                'sponsors' => 'required',
                'patrons' => 'required',
                'supporters' => 'required',
                'friends' => 'required',
                'donate' => 'required'
            ]);

            if ($request->sponsors_number) {

                $sponsors_name = implode(',', $request->sponsors);

                $patrons_name = implode(',', $request->patrons);

                $supporters_name = implode(',', $request->supporters);

                $friends_name = implode(',', $request->friends);
                $values = [
                    'content' => $request->content,
                    'sponsors' => $sponsors_name,
                    'patrons' => $patrons_name,
                    'supporters' => $supporters_name,
                    'friends' => $friends_name,
                    'donate' => $request->donate,
                ];

                DB::table('patrons_supporters')->where('id', '=', '1')->update($values);

            } else {

                $sponsors_name = implode(',', $request->sponsors);

                $patrons_name = implode(',', $request->patrons);

                $supporters_name = implode(',', $request->supporters);

                $friends_name = implode(',', $request->friends);
                $values = [
                    'content' => $request->content,
                    'sponsors' => $sponsors_name,
                    'patrons' => $patrons_name,
                    'supporters' => $supporters_name,
                    'friends' => $friends_name,
                    'donate' => $request->donate,
                ];

                DB::table('patrons_supporters')->insert($values);
            }

            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->route('get_teams_details');
        } catch (\Exception $e) {
            DB::rollback();
            // Toastr::error('fail, User Update :)', 'Error');
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->route('get_teams_details');
        }

    }

    public function counsult_data(Request $request)
    {
       
        // print_r($request->all());
        // exit();
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'consultants_name' => 'required',
                'consultants_designation' => 'required'
            ]);

            if ($request->updateConsultant) {
                for ($i = 0; $i <= $request->counsult_number; $i++) {
                    if (isset($request['id'][$i])) {

                        $values = [
                            'name' => $request['consultants_name'][$i],
                            'department' => $request['consultants_designation'][$i],
                        ];
                        DB::table('consultants')->where('id', $request['id'][$i])->update($values);
                    } else {
                        $values2 = [
                            'name' => $request['consultants_name'][$i],
                            'department' => $request['consultants_designation'][$i],
                        ];
                        DB::table('consultants')->insert($values2);
                    }
                }
            } else {
                for ($i = 0; $i <= $request->counsult_number; $i++) {
                    $values = [
                        'name' => $request->consultants_name[$i],
                        'department' => $request->consultants_designation[$i],
                    ];
                    //print_r($values);
                    DB::table('consultants')->insert($values);
                }
            }

            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->route('get_teams_details');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->route('get_teams_details');
        }

    }

    public function delete_executive_team(Request $request)
    {
        try {

            DB::table('executive_team')->where('id', $request->myData)->delete();

            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }

    }

    public function delete_consultant(Request $request)
    {
        try {

            DB::table('consultants')->where('id', $request->myData)->delete();

            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }

    }

    // public function get_teams_data()
    // {

    //     $childrens_panel = DB::table('childrens_panel')->select('*')->distinct()
    //     ->get()->toArray();

    //     $event_assets = DB::table('event_assets')->select('*')->distinct()
    //     ->get()->toArray();

    //     $executive_team = DB::table('executive_team')->select('*')->distinct()
    //     ->get()->toArray();

    //     $join_us = DB::table('join_us')->select('*')->distinct()
    //     ->get()->toArray();

    //     $advisory_board = DB::table('advisory_board')->select('*')->distinct()
    //     ->get()->toArray();

    //     $patrons_supporters = DB::table('patrons_supporters')->select('*')->distinct()
    //     ->get()->toArray();

    //     $consultants = DB::table('consultants')->select('*')->distinct()
    //     ->get()->toArray();

    //     $response_array = ['success' => true , 'childrens_panel' => $childrens_panel, 'event_assets' => $event_assets, 'executive_team' => $executive_team, 'patrons_supporters' => $patrons_supporters, 'join_us' => $join_us, 'advisory_board' => $advisory_board, 'consultants' => $consultants];

    //     // print_r($response_array['data'][1]['img_name'][1]);
    //     // exit();

    //     return response()->json($response_array , 200);
    // }
    public function get_teams_data()
    {
        $childrens_panel = DB::table('childrens_panel')->select('*')->distinct()->get()->toArray();

        $event_assets = DB::table('event_assets')->select('*')->distinct()->get()->toArray();

        // Loop through $event_assets and set the img_name to the full asset URL
        foreach ($event_assets as &$asset) {
            $asset->img_name = asset('uploads/' . $asset->img_name);
        }

        $executive_team = DB::table('executive_team')->select('*')->distinct()->get()->toArray();
        $join_us = DB::table('join_us')->select('*')->distinct()->get()->toArray();
        $advisory_board = DB::table('advisory_board')->select('*')->distinct()->get()->toArray();
        $patrons_supporters = DB::table('patrons_supporters')->select('*')->distinct()->get()->toArray();
        $consultants = DB::table('consultants')->select('*')->distinct()->get()->toArray();

        $response_array = [
            'success' => true,
            'childrens_panel' => $childrens_panel,
            'event_assets' => $event_assets,
            'executive_team' => $executive_team,
            'patrons_supporters' => $patrons_supporters,
            'join_us' => $join_us,
            'advisory_board' => $advisory_board,
            'consultants' => $consultants,
        ];

        return response()->json($response_array, 200);
    }

    // public function get_teams_data()
    // {
    //     // Fetch data from various tables
    //     $childrens_panel = DB::table('childrens_panel')->select('*')->distinct()->get()->toArray();
    //     $event_assets = DB::table('event_assets')->select('*')->distinct()->get()->toArray();
    //     $executive_team = DB::table('executive_team')->select('*')->distinct()->get()->toArray();
    //     $join_us = DB::table('join_us')->select('*')->distinct()->get()->toArray();
    //     $advisory_board = DB::table('advisory_board')->select('*')->distinct()->get()->toArray();
    //     $patrons_supporters = DB::table('patrons_supporters')->select('*')->distinct()->get()->toArray();
    //     $consultants = DB::table('consultants')->select('*')->distinct()->get()->toArray();

    //     // Function to fetch image URLs
    //     $getImageUrl = function ($data, $tableName) {
    //         foreach ($data as &$item) {
    //             // Check if the item has an 'img_name' field
    //             if (isset($item->img_name)) {
    //                 $item->imageUrl = asset('images/' . $tableName . '/' . $item->img_name);
    //             }
    //         }
    //     };

    //     // Fetch image URLs for each data set

    //     $getImageUrl($event_assets, 'event_assets');
    //     $getImageUrl($executive_team, 'executive_team');

    //     // Create the response array
    //     $response_array = [
    //         'success' => true,
    //         'childrens_panel' => $childrens_panel,
    //         'event_assets' => $event_assets,
    //         'executive_team' => $executive_team,
    //         'patrons_supporters' => $patrons_supporters,
    //         'join_us' => $join_us,
    //         'advisory_board' => $advisory_board,
    //         'consultants' => $consultants,
    //     ];

    //     return response()->json($response_array, 200);
    // }

}
