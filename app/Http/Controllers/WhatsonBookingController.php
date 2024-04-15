<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhatsonBookingController  extends Controller
{
    public function whatson_store(Request $request)
{
    try {
        // Validate the incoming request data
        $request->validate([
            'Event_Title' => 'required',
            'Tickets' => 'required',
            'Email' => 'required',
            'Name' => 'required',
            'Date_of_Birth' => 'required',
            'Phone_Number' => 'required',
            'Total_Price' => 'required',
            'web_ref' => 'required',
        ]);

        $names = explode(',', $request->input('Name'));
$dateOfBirth = explode(',', $request->input('Date_of_Birth'));

// Convert arrays back to comma-separated strings
$namesString = implode(',', $names);
$dateOfBirthString = implode(',', $dateOfBirth);

// Insert data into the visit_bookings table
DB::table('whats_on_bookings')->insert([
    'Event_Title' => $request->input('Event_Title'),
    'Tickets' => $request->input('Tickets'),
    'Email' => $request->input('Email'),
    'Name' =>  $namesString,
    'Date_of_Birth' => $dateOfBirthString,
    'Phone_Number' => $request->input('Phone_Number'),
    'Total_Price' => $request->input('Total_Price'),
    'Booking_Reference_Number' => $request->input('refernce_id'),
    'Payment_Status' => $request->input('payment_status'),
    'Paid_Amount' => $request->input('amount'),
    'web_ref' => $request->input('web_ref'),

]);


        return response()->json(['status' => 'success', 'message' => 'Record added successfully']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}


public function fetchRecords_whatson_page(Request $request)
    {
      
      // it is used in the thank you page after booking.
        // Validate the request
        $request->validate([
            'web_ref' => 'required',
        ]);

        // Fetch records from the database
        $records = DB::table('whats_on_bookings')->where('web_ref', $request->input('web_ref'))
            ->select(array('Event_Title', 'Tickets', 'Booking_Reference_Number'))
            ->get();

        // Return the records as JSON with a success status
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $records,
        ], 200);
    }




    
}
