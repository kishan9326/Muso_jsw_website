<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
{

    public function index()
    {
        return view('explore.add_explore_section');
    }
    // =====================================================================================

    public function view_explore()
    {
        // Fetch all records from the explore_section table
        $exploreDetails = DB::table('explore_section')->get();

        // Pass the data to the view
        return view('explore.view_explore', ['exploreDetails' => $exploreDetails]);
    }

    // =====================================================================================

    public function add_explore(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'title' => 'required',
                'subtitle' => 'required',
                'text' => 'required',
                'tab_name' => 'required',
                'tab_text' => 'required',
            ]);
            $newName = '';
            if ($request->hasFile('image')) {
                $image1 = $request->file('image');
                $filename1 = $image1->getClientOriginalName();
                $nameWithoutSpaces1 = str_replace(' ', '_', $filename1);
                $randomNumber = random_int(0,99); // You can adjust the range as needed
                $newName = $randomNumber . '_' . $nameWithoutSpaces1;
                $image1->move(public_path() . '/uploads/', $newName);
            }
            $newName_2 = '';
            if ($request->hasFile('tagline_image')) {
                $tagline_image = $request->file('tagline_image');
                $filename12 = $tagline_image->getClientOriginalName();
                $nameWithoutSpaces_2 = str_replace(' ', '_', $filename12);
                $randomNumber_2 = random_int(0,99); // You can adjust the range as needed
                $newName_2 = $randomNumber_2 . '_' . $nameWithoutSpaces_2;
                $tagline_image->move(public_path() . '/uploads/', $newName_2);
            }

            $values = [
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'text' => $request->text,
                'image' => ($newName == '') ? '' : $newName,
                'tagline' => ($newName_2 == '') ? '' : $newName_2,
            ];

            $exploreSectionId = DB::table('explore_section')->insertGetId($values);
            // return redirect()->back();
            // exit();
            // ===========   FOR TABS   ===========

            for ($i = 0; $i < $request->number; $i++) {
                $newName_3 = '';
                if ($request->hasFile('tab_image')) {
                    $image = $request->file('tab_image')[$i];
                    $filename = $image->getClientOriginalName();
                    $nameWithoutSpaces_3 = str_replace(' ', '_', $filename);
                    $randomNumber_3 = random_int(0,99); // You can adjust the range as needed
                    $newName_3 = $randomNumber_3 . '_' . $nameWithoutSpaces_3;
                    $image->move(public_path() . '/uploads/', $newName_3);
                }

                $values_2 = [
                    'explore_id' => $exploreSectionId,
                    'tab_name' => $request->tab_name[$i],
                    'tab_text' => $request->tab_text[$i],
                    'tab_image' => ($newName_3 == '') ? '' : $newName_3,
                ];

                DB::table('explore_tab')->insert($values_2);
            }
            Toastr::success('Data added successfully :)', 'Success');

            // Commit the transaction if using a database transaction
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            // Toastr::error('fail, User Update :)', 'Error');
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    // =====================================================================================

    public function edit_explore($id)
    {
        // Retrieve data from explore_section table
        $exploreSection = DB::table('explore_section')->find($id);

        // Retrieve data from explore_tab table based on explore_id
        $exploreTabs = DB::table('explore_tab')->where('explore_id', $id)->get();

        return view('explore.edit_explore_details', ['exploreSection' => $exploreSection, 'exploreTabs' => $exploreTabs]);
    }

    // =====================================================================================

    public function update_explore(Request $request)
    {
        // ============================== FOR SECTION STARTS   =======================================
        // echo '<pre>';
        // print_r($request->all());
        // exit();
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'title' => 'required',
                'subtitle' => 'required',
                'text' => 'required',
                'tab_name' => 'required',
                'tab_text' => 'required',
            ]);

            if ($request->hasFile('image')) {
                $image1 = $request->file('image');
                $filename1 = $image1->getClientOriginalName();
                $nameWithoutSpaces1 = str_replace(' ', '_', $filename1);
                $randomNumber = random_int(0,99); // You can adjust the range as needed
                $newName = $randomNumber . '_' . $nameWithoutSpaces1;
                $image1->move(public_path() . '/uploads/', $newName);

                $values_1 = [
                    'image' => $newName,
                ];
                $exploreSectionId = DB::table('explore_section')->where('id', '=', $request->explore_id)->update($values_1);
            }

            if ($request->hasFile('tagline_image')) {
                $tagline_image = $request->file('tagline_image');
                $filename12 = $tagline_image->getClientOriginalName();
                $nameWithoutSpaces_2 = str_replace(' ', '_', $filename12);
                $randomNumber_2 = random_int(0,99); // You can adjust the range as needed
                $newName_2 = $randomNumber_2 . '_' . $nameWithoutSpaces_2;
                $tagline_image->move(public_path() . '/uploads/', $newName_2);
                $values_12 = [
                    'tagline' => $newName_2,
                ];
                $exploreSectionId = DB::table('explore_section')->where('id', '=', $request->explore_id)->update($values_12);
            }

            $values = [
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'text' => $request->text,
            ];

            $exploreSectionId = DB::table('explore_section')->where('id', '=', $request->explore_id)->update($values);

            // <-------------------------------------------------------------------------------- FOR TAB STARTS   -------------------------------------------------------------------------------->

            for ($i = 0; $i <= $request->number; $i++) {
                //  echo '<pre>';
                //         print_r($request->all());
                //         exit();

                if (isset($request->explore_tab_id[$i])) {
                    if (isset($request->file('tab_image')[$i])) {
                        $tab_image = $request->file('tab_image')[$i];
                        $filename = $tab_image->getClientOriginalName();
                        $nameWithoutSpaces_3 = str_replace(' ', '_', $filename);
                        $randomNumber_3 = random_int(0,99); // You can adjust the range as needed
                        $newName_3 = $randomNumber_3 . '_' . $nameWithoutSpaces_3;
                        $tab_image->move(public_path() . '/uploads/', $newName_3);
                        $values_3 = [
                            'tab_image' => $newName_3,
                        ];
                        $exploreSectionId = DB::table('explore_tab')->where('id', '=', $request->explore_tab_id[$i])->update($values_3);
                    }

                    $values_2 = [
                        'tab_name' => $request->tab_name[$i],
                        'tab_text' => $request->tab_text[$i],

                    ];
                    $exploreSectionId = DB::table('explore_tab')->where('id', '=', $request->explore_tab_id[$i])->update($values_2);
                } else {
                     $newName_3 = '';
                    if (isset($request->file('tab_image')[$i])) {
                        $tab_image = $request->file('tab_image')[$i];
                        $filename = $tab_image->getClientOriginalName();
                        $nameWithoutSpaces_3 = str_replace(' ', '_', $filename);
                        $randomNumber_3 = random_int(0,99); // You can adjust the range as needed
                        $newName_3 = $randomNumber_3 . '_' . $nameWithoutSpaces_3;
                        $tab_image->move(public_path() . '/uploads/', $newName_3);

                    }

                    $values_2 = [
                        'explore_id' => $request->explore_id,
                        'tab_name' => $request->tab_name[$i],
                        'tab_text' => $request->tab_text[$i],
                         // 'tab_image' => $newName_3,
                        'tab_image' => ($newName_3 == '') ? '' : $newName_3,

                    ];
                    $exploreSectionId = DB::table('explore_tab')->insert($values_2);
                }

            }
            Toastr::success('Data added successfully :)', 'Success');

            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            // Toastr::error('fail, User Update :)', 'Error');
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    // =====================================================================================

    // public function delete_explore($id)
    // {
    //     // echo '<pre>';
    //     //             print_r($request->all());
    //     //             exit();
    //     try {
    //         DB::table('explore_tab')->where('explore_id', $id)->delete();
    //         // Find the record by its ID and delete it
    //         DB::table('explore_section')->where('id', $id)->delete();

    //         Toastr::success('Data deleted successfully :)', 'Success');

    //         return redirect()->back();
    //     } catch (\Exception $e) {

    //         DB::rollback();
    //         Toastr::error('User delete fail :)', 'Error');
    //         return redirect()->back();
    //     }
    // }
    public function delete_explore(Request $request)
    {
        // echo '<pre>';
        //             print_r($request->all());
        //             exit();
        try {
            DB::table('explore_tab')->where('explore_id', $request->id)->delete();
            // Find the record by its ID and delete it
            DB::table('explore_section')->where('id', $request->id)->delete();

            Toastr::success('Data deleted successfully :)', 'Success');

            return redirect()->back();
        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }
    }

    public function delete_explore_tab(Request $request)
    {
        // echo '<pre>';
        //             print_r($request->all());
        //             exit();
        try {

            DB::table('explore_tab')->where('id', $request->myData)->delete();

            Toastr::success('Data deleted successfully :)', 'Success');

            return redirect()->back();
        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }
    }

    // =================================API STARTS====================================================

    public function get_explore_api()
    {
        // Fetch all records from the explore_section table
        $exploreDetails = DB::table('explore_section')->get();
        foreach ($exploreDetails as $record) {
            $record->image = asset('uploads/' . $record->image);
            $record->tagline = asset('uploads/' . $record->tagline);
        }
    
        // Return a JSON response
        return response()->json([
            'success' => true,
            'exploreDetails' => $exploreDetails,
        ]);
    }

    // =====================================================================================

    // public function get_explore_tab_api()
    // {
    //     // Fetch all records from the explore_section table
    //     $explore_tab_details = DB::table('explore_tab')->get();
    //     foreach ($explore_tab_details as $record) {
    //         $record->tab_image = asset('uploads/' . $record->tab_image);
    //     }
    //     // Return a JSON response
    //     return response()->json([
    //         'success' => true,
    //         'explore_tab_details' => $explore_tab_details,
    //     ]);
    // }
    
    public function get_explore_tab_api()
{
    // Fetch all records from the explore_section table
    $explore_tab_details = DB::table('explore_tab')->get();
    
    foreach ($explore_tab_details as $record) {
        if ($record->tab_image === null) {
            // Set tab_image to null or an empty string based on your requirement
            $record->tab_image = ""; // or $record->tab_image = "";
        } else {
            $record->tab_image = asset('uploads/' . $record->tab_image);
        }
    }
    
    // Return a JSON response
    return response()->json([
        'success' => true,
        'explore_tab_details' => $explore_tab_details,
    ]);
}


}
