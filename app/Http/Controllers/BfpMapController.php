<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BfpMapController extends Controller
{
    public function closeMap(Request $request)
    {
        // Check the user role from the session
        $userRole = $request->session()->get('userPosition');

        // Log the user role for debugging
        Log::info('User Role: ' . $userRole);
        Log::info('Session Data: ' . print_r($request->session()->all(), true));


        // Redirect based on user role
        if ($userRole == '1') {
            return redirect('/bfp-admin');
        } elseif ($userRole == '2') {
            return redirect('/bfp-responder');
        }


    }
}
