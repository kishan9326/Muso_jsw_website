<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class DoodlePromptController extends Controller
{
    // index page
    public function index()
    {
        return view('doodle_prompt.addPrompt');
        // $user_table = User::all();
        // return view ('usermanagement.usertable',compact('user_table'));
    }


    public function promptData(Request $request)
    {
        // print_r($request->all());
        // exit();
       DB::beginTransaction();

        try {
        if($request->img_2 != ''){
                    $file=$request->file('img_2');
                    $imgName=$file->getClientOriginalName();
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $imgName);
        }
        $values = [
            'name' => $request->name,
            'color' => $request->color_code,
            'text' => $request->prompt,
            // 'logo' => $imgName 
        ];
         DB::table('doodle_prompt')->insert($values);
         DB::commit();
         Toastr::success('Add data successfully :)','Success');
           
          return redirect()->route('getPromptData');
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)','Error');
            return redirect()->route('getPromptData');
        }
    }

    public function getPromptData()
    {
          $prompt_data = DB::table('doodle_prompt')->select('*')->distinct()
        ->get()->toArray();

         return view('doodle_prompt.viewPrompt', array('prompt_data' => $prompt_data));
    }


     public function edit_promptInfo($id)
    {
         $data = DB::table('doodle_prompt')->select('*')->where('id','=',$id)->distinct()
        ->get()->toArray();

        // print_r($data);
        // exit();
                $html = '<div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="hidden" name="id" value="'.$data[0]->id.'">
                                        <input type="text" placeholder="Color Name" class="form-control" name="name" value="'.$data[0]->name.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Color</label>
                                        <input type="text" placeholder="Color Code" class="form-control" name="color_code" value="'.$data[0]->color.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Prompt Text</label>
                                        <input type="text" placeholder="Prompt Message" class="form-control" name="prompt" value="'.$data[0]->text.'">
                                    </div>
                                </div>
                               <div class="row">
                        
                        </div>
                                ';

                return $html;
    }

    public function update_promptInfo(Request $request)
    {

       DB::beginTransaction();

        try {
            if($request->img_2 != ''){
                    $file=$request->file('img_2');
                    $imgName=$file->getClientOriginalName();
                    // $file->move('public/image',$name);
                    $file->move(public_path() . '/uploads/', $imgName);
                    $values = [
                    'name' => $request->name,
                    'color' => $request->color_code,
                    'text' => $request->prompt,
                    'logo' => $imgName
                    ];
            }
            else
            {
                    $values = [
                    'name' => $request->name,
                    'color' => $request->color_code,
                    'text' => $request->prompt
                    ];
        
            }

         DB::table('doodle_prompt')->where('id','=',$request->id)->update($values);
         DB::commit();
         Toastr::success('Add data successfully :)','Success');
          return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)','Error');
            return redirect()->back();
        }
    }

    public function deletePromptRecord(Request $request)
    {
        try {

            DB::table('doodle_prompt')->where('id', $request->id)->delete();
          
            Toastr::success('User deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)','Error');
            return redirect()->back();
        }
    }
    
    // ------------------------------------------------------------------------------
    public function doodle_details()
    {
          $prompt_data = DB::table('doodle_details')->select('*')->distinct()
        ->get()->toArray();

         return view('doodle_prompt.view_doodle', array('prompt_data' => $prompt_data));
    }

    public function deletedoodleRecord(Request $request)
    {
        try {

            DB::table('doodle_details')->where('id', $request->id)->delete();
          
            Toastr::success('User deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)','Error');
            return redirect()->back();
        }
    }
    public function downloadDoodle($id)
{
    $doodleDetail = DB::table('doodle_details')->find($id);
    $path = public_path('uploads/' . $doodleDetail->doodle_image);
    return response()->download($path);
}
    // ------------------------------------------------------------------------------

     public function getPromptDataApi()
    {
          $prompt_data = DB::table('doodle_prompt')->select('*')->distinct()
        ->get()->toArray();

        //  return view('doodle_prompt.viewPrompt', array('prompt_data' => $prompt_data));

         $response_array = ['success' => true, 'data' => $prompt_data];

         // print_r($response_array['data'][1]['img_name'][1]);
         // exit();
 
         return response()->json($response_array, 200);
    }



    // /** profile user */
    // public function profileUser() {
    //     return view('usermanagement.userprofile');
    // }
}
