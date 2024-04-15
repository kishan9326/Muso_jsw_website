<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoodleUserDetailsController extends Controller
{
    // Save the user doodle data to the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            // 'age' => 'required|integer|min:0',
            // 'location' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Retrieve the user data from the request
        $name = $request->input('name');
        // $age = $request->input('age');
        // $location = $request->input('location');
        $email = $request->input('email');

        // Save the user data to the database
        if (DB::table('doodle_user_details')->insert([
            'name' => $name,
            'email' => $email,
            // 'location' => $location,
            // 'age' => $age,
        ])) {
            // Data was successfully saved, return a success response
            return response()->json([
                'success' => true,
                'message' => 'User details saved successfully',
                // 'name' => $name,
                // 'email' => $email,
                // 'location' => $location,
                // 'age' => $age,
            ]);
        } else {
            // Data saving failed, return a failure response
            return response()->json([
                'success' => false,
                'message' => 'Failed to save user details',
            ], 500);
        }
    }

// Retrieve all user details of doodle from the database
    public function getAllUserDetails()
    {

        $users = DB::table('doodle_user_details')->get();

        return response()->json(['users' => $users]);
    }


    public function store_doodle_details(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'doodle_image' => 'required',
            'filename' => 'required',
        ]);
    
        $emailId = $request->input('email');
        $imageData = $request->input('doodle_image');
        $filename_doodle = $request->input('filename');
    
        $img = str_replace('data:image/png;base64,', '', $imageData);
        $img = str_replace(' ', '+', $img);
        // $data = base64_decode($img);

        $decodedImage = base64_decode($img);
    
        if ($decodedImage === false) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Base64 image data',
            ], 400);
        }
    
        // Generate a unique filename for the image
        // $filename = 'doodle_' . time() . '.png'; 
                $filename = 'Doodle ' . $filename_doodle . '.png';
    
        // Save the image to the server
        $path = public_path('uploads/' . $filename);
        if (file_put_contents($path, $decodedImage)) {
            // Insert image information into the database
            DB::table('doodle_details')->insert([
                'email' => $emailId,
                'doodle_image' => $filename,
                'filename' => $filename_doodle,
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Doodle details saved successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save doodle details',
            ], 500);
        }
    }

//get latest 10 records

    public function getLatestRecords()
    {
        $latestRecords = DB::table('doodle_details')
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get();

        // Iterate through the records and add the image URL to each record
        foreach ($latestRecords as $record) {
            // Assuming 'doodle_image' contains the image filename
            $record->doodle_image = asset('uploads/' . $record->doodle_image);
        }

        return response()->json($latestRecords);
    }

    public function save_doodle($id)
    {
        $doodleDetail = DB::table('doodle_details')->find($id);
        if (empty($doodleDetail)) {
            exit('Something went wrong');
        }
        $file = public_path('uploads/' . $doodleDetail->doodle_image);
        $content = file_get_contents($file);
        header('Content-Disposition: attachment; filename="' . $doodleDetail->doodle_image . '"');
        header("Content-Type:image/png");
        header("Content-Length: " . filesize($file));
        echo $content;
        unlink($content);
    }
}
