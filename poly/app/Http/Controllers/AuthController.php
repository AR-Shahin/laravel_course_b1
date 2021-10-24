<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $success['token'] =  $user->createToken('SanctumAPI')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->responseOk($success, 'User register successfully.', 201);
    }

    public function login(Request $request)
    {
        //return $request->all();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('SanctumAPI')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->responseOk($success, 'User Login successfully.', 200);
        } else {
            return $this->responseErr('Username or password Err', 422);
        }
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
