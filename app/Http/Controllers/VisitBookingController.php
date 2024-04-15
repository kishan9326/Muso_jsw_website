<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitBookingController  extends Controller
{
    public function store(Request $request)
{
    try {
        // Validate the incoming request data
        $request->validate([
            'Date_field' => 'required',
            'Child_Tickets' => 'required',
            'Adult_Tickets' => 'required',
            'Slot_From_Sites' => 'required', // Add valid options
            'Email' => 'required',
            'Ticket_Type' => 'required',
            'Phone_Number' => 'required',
            'Names' => 'required',
            'Date_of_Birth' => 'required',
            'Total_Price' => 'required',
            'Grand_Total' => 'required',
        ]);

        $names = explode(',', $request->input('Names'));
$dateOfBirth = explode(',', $request->input('Date_of_Birth'));

// Convert arrays back to comma-separated strings
$namesString = implode(',', $names);
$dateOfBirthString = implode(',', $dateOfBirth);

// Insert data into the visit_bookings table
DB::table('visit_bookings')->insert([
    'Date_field' => $request->input('Date_field'),
    'Child_Tickets' => $request->input('Child_Tickets'),
    'Adult_Tickets' => $request->input('Adult_Tickets'),
    'Slot_From_Sites' => $request->input('Slot_From_Sites'),
    'Email' => $request->input('Email'),
    'Ticket_Type' => $request->input('Ticket_Type'),
    'Phone_Number' => $request->input('Phone_Number'),
    'Names' => $namesString,
    'Date_of_Birth' => $dateOfBirthString,
    'Total_Price' => $request->input('Total_Price'),
    'Grand_Total' => $request->input('Grand_Total'),
    
    'refernce_id' => $request->input('refernce_id'),
    'payment_status' => $request->input('payment_status'),
    'amount' => $request->input('amount'),
    'web_ref' => $request->input('web_ref'),

]);

        return response()->json(['status' => 'success', 'message' => 'Record added successfully']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

public function index()
{
    try {
        // Fetch all records from the visit_bookings table
        $records = DB::table('visit_bookings')->get();

        // Convert comma-separated strings to arrays
        $records = $records->map(function ($record) {
            $record->Names = explode(',', $record->Names);
            $record->Date_of_Birth = explode(',', $record->Date_of_Birth);
            return $record;
        });

        return response()->json(['status' => 'success', 'data' => $records]);
    } catch (\Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}


public function fetchRecords(Request $request)
    {
        // Validate the request
        $request->validate([
            'web_ref' => 'required',
        ]);

        // Fetch records from the database
        $records = DB::table('visit_bookings')->where('web_ref', $request->input('web_ref'))
            ->select('Date_field', 'Slot_From_Sites', 'Child_Tickets', 'Adult_Tickets', 'refernce_id')
            ->get();

        // Return the records as JSON with a success status
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $records,
        ], 200);
    }

// public function update(Request $request)
// {
//     $this->validate($request, [
//         'web_ref' => 'required',
//         'payment_status' => 'required',
//         'amount' => 'required',
//         'refernce_id' => 'required',

//     ]);

//     // Get the id based on the web_ref
//     $booking = DB::table('visit_bookings')
//                 ->where('web_ref', $request->web_ref)
//                 ->first();

//     // Check if a booking with the given web_ref exists
//     if ($booking) {
//         // Update the payment_status field
//         DB::table('visit_bookings')
//             ->where('id', $booking->id)
//             ->update(['payment_status' => $request->payment_status,
//                       'amount' => $request->amount,
//                       'refernce_id' => $request->refernce_id,

//                     ]);

//         // Commit the transaction
//         DB::commit();

//         // Return a success JSON response
//         return response()->json(['message' => 'Payment status updated successfully'], 200);
//     } else {
//         // If no booking is found, return an error JSON response
//         return response()->json(['error' => 'Booking not found for the provided web_ref'], 404);
//     }
// }


    
}
