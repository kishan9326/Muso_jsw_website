<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    
 





    // index page
    public function index()
    {
        return view('about.addcontent');
        // $user_table = User::all();
        // return view ('usermanagement.usertable',compact('user_table'));
    }

    public function getAboutList()
    {
        $data = DB::table('about_content')->select('about_content.section_id', 'about_content.text', 'about_content.text2')->distinct()->orderBy('section_id', 'ASC')
            ->get()->toArray();
        //$img_name1 = [];
        $final_array = [];
        //print_r($data);
        // exit();
        // echo(count($data));
        for ($i = 0; $i < count($data); $i++) {

            // echo $data[$i]->section_id;
            if ($data[$i]->section_id == 1 || $data[$i]->section_id == 3 || $data[$i]->section_id == 5) {
                $data_img['img_name'] = '';
                $data_img['text'] = $data[$i]->text;
                $data_img['text2'] = $data[$i]->text2;
                $data_img['section_id'] = $data[$i]->section_id;
            } else {
                $query = DB::table('about_assets');
                $query->where('section_id', $data[$i]->section_id);
                $rows = $query->get()->toArray();
                $img_name1 = [];
                $data_img = [];
                $data_img['text'] = $data[$i]->text;
                $data_img['text2'] = $data[$i]->text2;
                $data_img['section_id'] = $data[$i]->section_id;
                foreach ($rows as $imgName) {

                    $img_name1[] = $imgName->img_name;
                    $data_img['img_name'] = $img_name1;
                }
            }

            // $result = $rows->toArray();

            // $img_name[] = $rows[$i]->img_name;
            $final_array[] = $data_img;

        }
        //$final_array;
        //echo $data_img;

        // $data = [];
        // $response_data1 = [];
        // $response = DB::SELECT('SELECT * FROM about_content');
        // foreach($data as $key => $node)
        // {
        //     //print_r($response_data->section_id);
        //    // $response_data1['section_id'] = $response_data->section_id;
        //     //$image_date = DB::SELECT('SELECT * FROM about_assets WHERE section_id = ?',$response_data->section_id);
        //     $query =  DB::table('about_assets');
        //     $query->where('section_id', $response_data->section_id);
        //     $rows = $query->get()->toArray();
        //    // $result = $rows->toArray();
        //     print_r($rows[$key]->img_name);
        //     // if($rows[0]->img_name)
        //     // {
        //     //     //$data['image_data'] = implode(',', $rows[0]->img_name);

        //     // }
        //     // else
        //     // {
        //     //     $data['image_data'][] = '';

        //     // }

        // }
        //array_push($response_data1,$data);
        // print_r($final_array);
        //  exit();

        return view("about.viewcontent", ["data" => $final_array]);
    }

    public function addContent(Request $request)
    {
        DB::beginTransaction();
        try {

            $values = [
                'section_id' => $request->section_id,
                'title' => $request->title,
                'text' => $request->content,
            ];

            //$input=$request->all();
            //$images=array();

            DB::table('about_content')->insert($values);
            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->back();
        }
    }

    public function addSection2(Request $request)
    {
        DB::beginTransaction();
        try {

            $values = [
                'section_id' => $request->section_id,
                'title' => $request->title,
                'text' => $request->content,
            ];

            //$input=$request->all();
            //$images=array();
            if ($files = $request->file('upload')) {
                foreach ($files as $file) {

                    $name = $file->getClientOriginalName();
                    $nameWithoutSpaces = str_replace(' ', '_', $name); // Replace spaces with underscores
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $nameWithoutSpaces);
                    //$images[]=$name;
                    $values1 = [
                        'section_id' => $request->section_id,
                        'img_name' => $nameWithoutSpaces,
                    ];
                    DB::table('about_assets')->insert($values1);
                }
            }

            DB::table('about_content')->insert($values);
            Toastr::success('Add data successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->back();
        }
    }

    

    public function about_section5(Request $request)
    {
        // print_r($request->all());
        // exit();
        DB::beginTransaction();
        try {

            $values = [
                'section_id' => $request->section_id,
                'title' => $request->title,
                'text' => $request->content,
            ];

            //$input=$request->all();
            //$images=array();

            if ($request->upload != '') {
                $file = $request->file('upload');
                $name = $file->getClientOriginalName();
                $nameWithoutSpaces = str_replace(' ', '_', $name); // Replace spaces with underscores

                // $file->move('public/image',$name);
                $file->move(public_path() . '/uploads/', $nameWithoutSpaces);

                $values2 = [
                    'section_id' => $request->section_id,
                    'img_name' => $nameWithoutSpaces,

                ];

                // print_r($values1);
                // exit();

                DB::table('about_assets')->insert($values2);

            }

            //$input=$request->all();
            //$images=array();
            if ($request->anual_report != '') {
                $file = $request->file('anual_report');
                $name = $file->getClientOriginalName();
                $nameWithoutSpaces = str_replace(' ', '_', $name); // Replace spaces with underscores
                // $file->move('public/image',$name);
                $file->move(public_path() . '/uploads/', $nameWithoutSpaces);

                $press_kit = $request->file('press_kit');
                $press_kit_name = $press_kit->getClientOriginalName();
                $nameWithoutSpaces = str_replace(' ', '_', $press_kit_name); // Replace spaces with underscores
                // $file->move('public/image',$name);
                $press_kit->move(public_path() . '/uploads/', $nameWithoutSpaces);
                $values1 = [
                    'section_id' => $request->section_id,
                    'annual_year' => $request->anual_year,
                    'annual_report' => $nameWithoutSpaces,
                    'press_kit' => $nameWithoutSpaces,

                ];

                // print_r($values1);
                // exit();

                DB::table('about_anual_report')->insert($values1);

            }
            DB::table('about_content')->insert($values);
            Toastr::success('Update data successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->back();
        }
    }
    /** edit record */

    public function edit_content()
    {

        $data = DB::table('about_content')->select('about_content.section_id', 'about_content.title', 'about_content.text', 'about_content.text2')->distinct()
            ->get()->toArray();
        //$img_name1 = [];
        $final_array = [];

        // print_r($data);
        // exit();
        // echo(count($data));

        // echo $data[$i]->section_id;
        //  $query =  DB::table('about_assets');
        //  $query->where('section_id', $data[0]->section_id);
        //  $rows = $query->get()->toArray();
        //  $img_name1 = [];
        // // $data_img = [];
        //        $data_img['text'] = $data[0]->text;
        //        $data_img['title'] = $data[0]->title;
        //        $data_img['section_id'] = $data[0]->section_id;

        // print_r($data_img);
        // exit();

        $query = DB::table('about_assets');
        //$query->where('section_id', $data[0]->section_id);
        $rows = $query->get()->toArray();
        $img_name1 = [];
        foreach ($rows as $imgName) {

            $img_name1[] = $imgName->img_name;
            $img_id[] = $imgName->id;
            $data_img['img_id'] = $img_id;
            $data_img['img_name'] = $img_name1;
        }

        $query1 = DB::table('about_anual_report');
        //$query1->where('section_id', $data[0]->section_id);
        $rows1 = $query1->get()->toArray();

        // print_r($rows1[0]);
        // exit();

        return view("about.editcontent", ["data_img" => $data, "data_assets" => $data_img, "pdf_assets" => $rows1[0]]);
        // return view("about.viewcontent", ["data"=>$final_array]);

    }

    /** update record */
    public function update_section(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit();
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'title' => 'required',
                'content' => 'required',
                // 'content2' => 'required'
            ]);

            $values = [
                'section_id' => $request->section_id,
                'title' => $request->title,
                'text' => $request->content,
                'text2' => $request->content2
            ];

            
        // if ($request->hasFile('image')) {
        //     $image1 = $request->file('image');
        //     $filename1 = $image1->getClientOriginalName();
        //     $nameWithoutSpaces1 = str_replace(' ', '_', $filename1);
        //     $randomNumber = mt_rand(1000, 999999); // You can adjust the range as needed
        //     $newName = $randomNumber . '_' . $nameWithoutSpaces1;
        //     $image1->move(public_path() . '/uploads/', $newName);
 
        //     $values_1 = [
        //         'image' => $newName,
        //     ];
        //     $exploreSectionId = DB::table('explore_section')->where('id', '=', $request->explore_id)->update($values_1);
        // }

            if ($request->section_id == 2 || $request->section_id == 4) {
                if ($request->img_1 != '') {
                    $file = $request->file('img_1');
                    $name_1 = $file->getClientOriginalName();
                    $nameWithoutSpaces_1 = str_replace(' ', '_', $name_1);
                    $randomNumber = random_int(0,99);
                    $newName = $randomNumber . '_' . $nameWithoutSpaces_1;
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $newName);
                    //$images[]=$name;
                    // $update = [
                    //     'img_name' => $name
                    // ];
                    // DB::enableQueryLog();
                    // $query =  DB::table('about_assets')->where('id',$request->img_id1)->update($update);
                    DB::table('about_assets')
                        ->where('id', $request->img_id1) // find your user by their email
                        ->update(array('img_name' => $newName));
                    //$query1 = DB::getQueryLog();
                    // dd($query1);
                    // exit();

                }
                if ($request->img_2 != '') {
                    $file = $request->file('img_2');
                    $name_2 = $file->getClientOriginalName();
                    $nameWithoutSpaces_2 = str_replace(' ', '_', $name_2);
                    $randomNumber = random_int(0,99);
                    $newName = $randomNumber . '_' . $nameWithoutSpaces_2;
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $newName);
                    //$images[]=$name;
                    DB::table('about_assets')
                        ->where('id', $request->img_id2) // find your user by their email
                        ->update(array('img_name' => $newName));
                }
                if ($request->img_3 != '') {
                    $file = $request->file('img_3');
                    $name_3 = $file->getClientOriginalName();
                    $nameWithoutSpaces_3 = str_replace(' ', '_', $name_3);
                    $randomNumber = random_int(0,99);
                    $newName = $randomNumber . '_' . $nameWithoutSpaces_3;
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $newName);
                    //$images[]=$name;
                    DB::table('about_assets')
                        ->where('id', $request->img_id3) // find your user by their email
                        ->update(array('img_name' => $newName));
                }
            }

            if ($request->section_id == 5) {
                if ($request->img_1 != '') {
                    $file = $request->file('img_1');
                    $name = $file->getClientOriginalName();
                    $nameWithoutSpaces = str_replace(' ', '_', $name);
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $nameWithoutSpaces);
                    DB::table('about_assets')
                        ->where('id', $request->img_id1) // find your user by their email
                        ->update(array('img_name' => $nameWithoutSpaces));

                }
                if ($request->annual_report != '') {
                    $file = $request->file('annual_report');
                    $name = $file->getClientOriginalName();
                    $nameWithoutSpaces = str_replace(' ', '_', $name);
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $nameWithoutSpaces);
                    //$images[]=$name;
                    //  DB::table('about_anual_report')
                    // ->where('section_id', $request->section_id)  // find your user by their email
                    // ->update(array('annual_report' => $name));
                    $updateRecord['annual_report'] = $nameWithoutSpaces;
                }
                if ($request->press_kit != '') {
                    $file = $request->file('press_kit');
                    $press_kit = $file->getClientOriginalName();
                    $nameWithoutSpaces = str_replace(' ', '_', $press_kit);
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $nameWithoutSpaces);
                    $updateRecord['press_kit'] = $nameWithoutSpaces;
                }

                $updateRecord['annual_year'] = $request->annual_year;
                DB::table('about_anual_report')
                    ->where('section_id', $request->section_id) // find your user by their email
                    ->update($updateRecord);
            }

            //$update['text'] = $request->content;
            DB::table('about_content')->where('section_id', $request->section_id)->update($values);
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

    /** get record */

    public function getAboutContent()
    {
        $data = DB::table('about_content')
            ->distinct()
            ->get()
            ->toArray();

        $final_array = [];
        if (!empty($data)) {
            foreach ($data as $d) {
                $query = DB::table('about_assets');
                $query->where('section_id', $d->section_id);
                $rows = $query->get()->toArray();
                $img_name = [];
                if (!empty($rows)) {
                    foreach ($rows as $r) {
                        $data_img['img_name'] = asset('uploads/' . $r->img_name);
                        array_push($img_name, asset('uploads/' . $r->img_name));
                    }
                }
                $temp = $d;
                $temp->img_name = $img_name;
                // echo '<pre>';
                // print_r($temp);

                $final_array[] = $temp;

            }
            $query1 = DB::table('about_anual_report');
            $query1->where('section_id', 5);
            $rows1 = $query1->take(1)->first();
            // echo '<pre>';
            // // print_r($rows1);
            // exit;
            $final_array[4]->annual_year = $rows1->annual_year;
            $final_array[4]->annual_report = asset('uploads/' . $rows1->annual_report);
            $final_array[4]->press_kit = asset('uploads/' . $rows1->press_kit);
            $response_array = ['success' => true, 'data' => $final_array];

          //return stripslashes(json_encode($response_array));
          //  return json_encode($response_array, JSON_UNESCAPED_SLASHES);
            //return response()->json($final_array, 200, [], JSON_UNESCAPED_SLASHES);

            return response()->json($response_array, 200);
            //return stripslashes(response()->json($response_array, 200,[],$options));
            // dd($data);

        }

        // for ($i = 0; $i < count($data); $i++) {
        //     $data_img = [];

        //     if ($data[$i]->section_id == 1 || $data[$i]->section_id == 3) {
        //         $data_img['img_name'] = '';
        //         $data_img['text'] = $data[$i]->text;
        //         $data_img['section_id'] = $data[$i]->section_id;
        //     } elseif ($data[$i]->section_id == 5) {
        //         $data_img['img_name'] = '';
        //         $data_img['text'] = $data[$i]->text;
        //         $data_img['section_id'] = $data[$i]->section_id;

        //         $query = DB::table('about_assets');
        //         $query->where('section_id', $data[$i]->section_id);
        //         $rows = $query->get()->toArray();

        //         if (!empty($rows)) {
        //             $data_img['img_name'] = asset('uploads/' . $rows[0]->img_name);
        //         }

        //         $query1 = DB::table('about_anual_report');
        //         $query1->where('section_id', $data[$i]->section_id);
        //         $rows1 = $query1->get()->toArray();

        //         if (!empty($rows1)) {
        //             $data_img['annual_year'] = $rows1[0]->annual_year;
        //             $data_img['annual_report'] = asset('uploads/' . $rows1[0]->annual_report);
        //             $data_img['press_kit'] = asset('uploads/' . $rows1[0]->press_kit);
        //         }
        //     } else {
        //         $query = DB::table('about_assets');
        //         $query->where('section_id', $data[$i]->section_id);
        //         $rows = $query->get()->toArray();
        //         $img_name1 = [];
        //         $data_img['text'] = $data[$i]->text;
        //         $data_img['section_id'] = $data[$i]->section_id;

        //         foreach ($rows as $imgName) {
        //             $img_name1[] = asset('uploads/' . $imgName->img_name);
        //         }

        //         $data_img['img_name'] = $img_name1;
        //     }

        //     $final_array[] = $data_img;
        // }

        // $response_array = ['success' => true, 'data' => $final_array];

        // return response()->json($response_array, 200);
    }

    /** delete record */
    public function deleteAboutRecord(Request $request)
    {
        try {
            if ($request->id == 5) {
                DB::table('about_content')->where('section_id', $request->id)->delete();
                DB::table('about_assets')->where('section_id', $request->id)->delete();
                DB::table('about_anual_report')->where('section_id', $request->id)->delete();
            } else {
                DB::table('about_content')->where('section_id', $request->id)->delete();
                DB::table('about_assets')->where('section_id', $request->id)->delete();
            }

            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }
    }

  

}
