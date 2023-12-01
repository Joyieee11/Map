<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserInformationModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createAccount(Request $request)
    {
        $request->validate([
            'account_number' => 'required',
            'position' => 'required',
            'birthday' => 'required',
        ]);

        // Convert user type to integer
        $userType = $this->getPositionValue($request->position);

        // Hash the birthday to be stored in the password column
        $hashedBirthday = Hash::make($request->birthday);

        // Check if the account number already exists
        if (UserInformationModel::where('account_number', $request->account_number)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Account number already exists',
            ]);
        }

        // Create a new user
        $user = UserInformationModel::create([
            'account_number' => $request->account_number,
            'full_name' => '',
            'position' => $userType,
            'gender' => '',
            'address' => '',
            'birthday' => $request->birthday,
            'password' => $hashedBirthday,
        ]);

        $user->login()->create([
            'account_number' => $request->account_number,
            'position' => $userType,
            'password' => $hashedBirthday,
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'data' => $user,
        ]);
    }

    private function getPositionValue($position)
    {
        switch ($position) {
            case 'BFP-ADMIN':
                return 1;
            case 'RESPONDER':
                return 2;
            case 'CABWAD-ADMIN':
                return 3;
            default:
                return -1;
        }
    }
    public function getUserInfo()
    {
        if (Auth::check()) {
            $user = Auth::user(); // Assuming the user is logged in

            // Retrieve user information based on the user ID
            $userInfo = UserInformationModel::where('user_id', $user->user_id)->first();

            if (!$userInfo) {
                return response()->json([
                    'success' => false,
                    'message' => 'User information not found',
                ]);
            }
    
            // Map position values to corresponding text
            $positionText = '';
            switch ($userInfo->position) {
                case 1:
                    $positionText = 'BFP Admin';
                    break;
                case 2:
                    $positionText = 'BFP Responder';
                    break;
                case 3:
                    $positionText = 'CABWAD Admin';
                    break;
                // Add more cases if needed
            }
            
            // Prepare the data to be sent as JSON
            $data = [
                'account_number' => $userInfo->account_number ?? '',
                'position' => $userInfo->position ?? '',
                'full_name' => $userInfo->full_name ?? '',
                'position_text' => $positionText,
                'gender' => $userInfo->gender ?? '',
                'address' => $userInfo->address ?? '',
                'birthday' => $userInfo->birthday ?? '',
            ];
            
            Log::info('Log data: ' . print_r($data, true));
            
    
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ]);
        }

    }

    public function getUsers()
    {
        $users = UserInformationModel::all();

        if ($users->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No data found',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $users,
        ]);
    }
    
    public function getUser($id)
    {
        $user = UserInformationModel::find($id);

        if ($user) {
            return response()->json([
                'success' => true,
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ]);
        }
    }

    public function updateUser(Request $request)
    {
        // Validation logic for updated data
        $request->validate([
            'fullName' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other', // Adjust values as needed
            'address' => 'nullable|string|max:255',
            // Add other validation rules as needed
        ]);

        // Retrieve updated data
        $userId = $request->userId;
        $fullName = $request->fullName;
        $gender = $request->gender;
        $address = $request->address;
        // Add other fields as needed

        // Update the user data in the database
        $user = UserInformationModel::find($userId);

        if ($user) {
            $user->update([
                'full_name' => $fullName,
                'gender' => $gender,
                'address' => $address,
                // Add other fields as needed
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User data updated successfully',
                'data' => [
                    'full_name' => $fullName,
                    'gender' => $gender,
                    'address' => $address,
                    // Add other fields as needed
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ]);
        }
    }

    public function editProfile()
    {
        // Add any logic you need for the edit profile page
        return view('edit-profile');
    }

}
