<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'query_dropdown' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $query_dropdown = $request->input('query_dropdown');

        if (DB::table('visit_member_form')->insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'query_dropdown' => $query_dropdown,
        ])) {
            return response()->json([
                'success' => true,
                'message' => 'User details saved successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save user details',
            ], 500);
        }
    }
    // -----------------------



    public function store_visit_school(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'query_dropdown' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $query_dropdown = $request->input('query_dropdown');

        if (DB::table('visit_school_form')->insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'query_dropdown' => $query_dropdown,
        ])) {
            return response()->json([
                'success' => true,
                'message' => 'User details saved successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save user details',
            ], 500);
        }
    }
}
