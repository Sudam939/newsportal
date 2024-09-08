<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\RegisterNotification;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|max:50|string",
                "email" => "required|email|unique:admins",
                "phone" => "required|unique:admins|digits:10",
                "password" => "required|min:6",
                "confirm_password" => "required|same:password",
            ]);

            $admin = Admin::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "password" => Hash::make($request->password),
            ]);

            $token = $admin->createToken($admin->email)->plainTextToken;

            return response()->json([
                "success" => true,
                "token" => $token,
                "message" => "Admin Registerd Successfully"
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                "success" => false,
                "message" => $e->errors()
            ]);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                "username" => "required",
                "password" => "required|min:6",
            ]);

            $admin = Admin::where('email', $request->username)->orWhere('phone', $request->username)->first();

            if (!$admin || !Hash::check($request->password, $admin->password)) {
                return response()->json([
                    "success" => false,
                    "message" => "username or password is incorrect"
                ]);
            }

            $token = $admin->createToken($admin->email)->plainTextToken;

            return response()->json([
                "success" => true,
                "token" => $token,
                "message" => "Admin LoggedIn Successfully"
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                "success" => false,
                "message" => $e->errors()
            ]);
        }
    }


    public function forgot_password(Request $request)
    {
        try {
            $request->validate([
                "email" => "required",
            ]);

            $admin = Admin::where('email', $request->email)->first();

            if (!$admin) {
                return response()->json([
                    "success" => false,
                    "message" => "email is incorrect"
                ]);
            }
            $password = rand(1000, 9999);
            $admin->password = Hash::make($password);
            $admin->update();

            $data = [
                "name" => $admin->name,
                "password" =>$password,
                "message" => "Welcome to our news portal. Your account has been created successfully. Now you can login with your credentials.",
            ];

            Mail::to($admin->email)->send(new RegisterNotification($data));

            return response()->json([
                "success" => true,
                "message" => "Password sent to your email"

            ]);
        } catch (ValidationException $e) {
            return response()->json([
                "success" => false,
                "message" => $e->errors()
            ]);
        }
    }

    public function logout()
    {

        Auth::user()->tokens()->delete();

        return response()->json([
            "success" => true,
            "message" => "Admin LoggedOut Successfully"
        ]);
    }
}
