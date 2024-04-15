<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CallbackController extends Controller
{
    // index page
    public function index()
    {
        return view('callback.callback');
    }


    public function webhook(Request $request)
    {
    
    $validator = Validator::make($request->all(), [ 
        // 'web_ref' => 'required',
        // 'payment_status' => 'required',
        // 'amount' => 'required',
        // 'refernce_id' => 'required',
        
        'web_ref' => 'required',
        'Payment_Status' => 'required',
        'Paid_Amount' => 'required',
        'Booking_Reference_Number' => 'required',
        
    ]);
  
    if ($validator->fails()) {
    return response()->json(['code' => 400, 'status'=> 'failed', 'message' => $validator->errors()], 400);
    }

    // Get the id based on the web_ref
    $booking = DB::table('visit_bookings')
                ->where('web_ref', $request->web_ref)
                ->first();

    // Check if a booking with the given web_ref exists
    if ($booking) {
        // Update the payment_status field
       DB::table('visit_bookings')
            ->where('id', $booking->id)
            ->update(['payment_status' => $request->Payment_Status,
                      'amount' => $request->Paid_Amount,
                      'refernce_id' => $request->Booking_Reference_Number,

                    ]);
        // Commit the transaction
        DB::commit();

        // Return a success JSON response
         return response()->json(['code' => 200, 'status'=> 'success', 'message' => 'Payment status updated successfully'], 200);
    } else {
        // If no booking is found, return an error JSON response
           return response()->json(['code' => 400, 'status'=> 'failed', 'message' => 'Booking not found for the provided web_ref'], 400);
    }
        
     
    }
    
    
    // ------------WHATSON ZOHO UPDATE BASED ON WEB_REF-----------------
     public function whatson_webhook(Request $request)
    {
    
            $validator = Validator::make($request->all(), [ 
                'web_ref' => 'required',
                'Payment_Status' => 'required',
                'Paid_Amount' => 'required',
                'Booking_Reference_Number' => 'required',

            ]);
        
        if ($validator->fails()) {
            return response()->json(['code' => 400, 'status'=> 'failed', 'message' => $validator->errors()], 400);
            }
        
            // Get the id based on the web_ref
            $booking = DB::table('whats_on_bookings')
                        ->where('web_ref', $request->web_ref)
                        ->first();
        
            // Check if a booking with the given web_ref exists
            if ($booking) {
                // Update the payment_status field
               DB::table('whats_on_bookings')
                    ->where('id', $booking->id)
                    ->update(['Payment_Status' => $request->Payment_Status,
                              'Paid_Amount' => $request->Paid_Amount,
                              'Booking_Reference_Number' => $request->Booking_Reference_Number,
            
                            ]);
                // Commit the transaction
                DB::commit();

        // Return a success JSON response
         return response()->json(['code' => 200, 'status'=> 'success', 'message' => 'Payment status updated successfully'], 200);
    } else {
        // If no booking is found, return an error JSON response
           return response()->json(['code' => 400, 'status'=> 'failed', 'message' => 'Booking not found for the provided web_ref'], 400);
    }
        
     
    }
  


   


 
    
}
