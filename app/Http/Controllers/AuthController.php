<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInformationModel;

class AuthController extends Controller
{
    const BFP_ADMIN = 1;
    const RESPONDER = 2;
    const CABWAD_ADMIN = 3;

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/home');
    }

    public function login(Request $request)
    {
        Log::info('Session Data: ' . print_r($request->session()->all(), true));
        $request->validate([
            'position' => 'required',
            'idNum' => 'required',
            'password' => 'required',
        ]);

        $positionValue = $this->getPositionValue($request->position);

        if ($positionValue !== -1 && $this->validateIdNum($request->idNum, $positionValue)) {
            if (Auth::guard('web')->attempt(['position' => $positionValue, 'account_number' => $request->idNum, 'password' => $request->password])) {
                // Authentication passed...
                return $this->handleSuccessfulLogin($request, $positionValue);
            } else {
                return $this->handleInvalidPassword();
            }
        } else {
            return $this->handleInvalidIdNum();
        }
    }

    private function getPositionValue($position)
    {
        switch ($position) {
            case 'bfp-admin':
                return self::BFP_ADMIN;
            case 'responder':
                return self::RESPONDER;
            case 'cabwad-admin':
                return self::CABWAD_ADMIN;
            default:
                return -1;
        }
    }

    private function validateIdNum($idNum, $positionValue)
    {
        return UserInformationModel::where('position', $positionValue)
            ->where('account_number', $idNum)
            ->exists();
    }

    private function handleSuccessfulLogin(Request $request, $positionValue)
    {
        // Set the correct session key based on the user position
        $sessionKey = 'userPosition';
        $request->session()->put($sessionKey, $positionValue);
    
        switch ($positionValue) {
            case self::BFP_ADMIN:
                return redirect()->route('bfpAdmin')->with('success', 'Login successful!');
            case self::RESPONDER:
                return redirect()->route('bfpResponder')->with('success', 'Login successful!');
            case self::CABWAD_ADMIN:
                return redirect()->route('cabwadAdmin')->with('success', 'Login successful!');
            default:
                // Handle other positions or invalid cases
                break;
        }
    }    

    private function handleInvalidPassword()
    {
        return redirect()->back()->withInput()->withErrors(['password' => 'Invalid password']);
    }

    private function handleInvalidIdNum()
    {
        return redirect()->back()->withInput()->withErrors(['idNum' => 'Invalid ID number']);
    }
}
