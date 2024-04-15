<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function homepage_video(Request $request)
    {
        // Validate the request
        $request->validate([
            'video' => 'required', // Adjust the allowed video formats and maximum file size as needed
        ]);

        // Check if the request has a file
        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Generate a unique name for the file with a random number
            $name = time() . '_' . rand(1, 9) . '_' . str_replace(' ', '_', $file->getClientOriginalName());

            // Move the file to the desired location
            $file->move(public_path() . '/uploads/', $name);

            // Insert the video name into the database
            $values = [
                'video' => $name,
            ];

            DB::table('homepage_video')->insert($values);

            return response()->json(['message' => 'Video uploaded successfully']);
        } else {
            return response()->json(['message' => 'No video file provided'], 400);
        }
    }
// ---------------------------------------------

    public function editHomepageVideo($id)
    {
        // Fetch the video record by ID
        $video = DB::table('homepage_video')->find($id);

        // Return the view with the video data
        return view('homepage.edit_homepage_video', compact('video'));
    }

    public function updateHomepageVideo(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'video' => 'required',
        ]);

        // Check if the request has a file
        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Generate a unique name for the file with a random number
            $name = time() . '_' . rand(1, 9) . '_' . str_replace(' ', '_', $file->getClientOriginalName());

            // Move the file to the desired location
            $file->move(public_path() . '/uploads/', $name);

            // Update the video name in the database
            $values = [
                'video' => $name,
            ];

            DB::table('homepage_video')->where('id', $id)->update($values);
        }

        Toastr::success('Update data successfully :)', 'Success');
        DB::commit();
        return redirect()->route('show_homepage_videos')->with('success', 'Video deleted successfully');
    }

    public function deleteHomepageVideo($id)
    {
        // Delete the video record by ID
        DB::table('homepage_video')->where('id', $id)->delete();

        // Redirect to the homepage or any other appropriate page
        return redirect()->route('show_homepage_videos')->with('success', 'Video deleted successfully');
    }

    public function showHomepageVideos()
    {

        // Fetch all videos from the database
        $videos = DB::table('homepage_video')->get();

        // Return the view with the video data
        return view('homepage.view_homepage_video', compact('videos'));
    }
    
    
    public function getVideo(Request $request)
{
    // Retrieve all video records
    $videos = DB::table('homepage_video')->get();

    
    // Prepare an array to store video information
    $videoArray = [];

    // Iterate through the videos and build the response array
    foreach ($videos as $video) {
        $fileLocation = public_path() . '/uploads/' . $video->video;

        // Check if the file exists
        if (file_exists($fileLocation)) {
            $videoArray[] = [
                // 'video' => $video->video,
                'video' => asset('uploads/' . $video->video),
            ];
        }
    }

    // Return the response array
    return response()->json(['success' => true, 'data' => $videoArray]);
}
    
    
    
    

// ---------------------------------------------

    // ---------------ADD EMAIL NEWSLETTER------------------
    public function email_newsletter(Request $request)
    {
        // Validate the request
        $request->validate([
            'email_newsletter' => 'required|email', // Adjust the allowed video formats and maximum file size as needed
        ]);

        DB::table('hompage_sign_up')->insert([
            'email_newsletter' => $request->input('email_newsletter'),

        ]);

        return response()->json(['message' => 'email uploaded successfully']);
    }
    //----------------

    public function view_email_newsletter()
    {
        // Fetch data from the database using the Query Builder
        $email_details = DB::table('hompage_sign_up')->select('*')->orderBy('id', 'DESC')->get();

        // Pass the data to the view
        return view('homepage.view_email_newsletter', ['email_details' => $email_details]);
    }


    public function delete_email_newsletter($id)
    {
        // Delete the video record by ID
        DB::table('hompage_sign_up')->where('id', $id)->delete();

        // Redirect to the homepage or any other appropriate page
        return redirect()->route('view_email_newsletter')->with('success', 'email deleted successfully');
    }

}
