<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    public function company()
    {
        $company = Company::first();
        return new CompanyResource($company);
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|max:255",
                "email" => "required|email",
                "phone" => "required|digits:10",
                "address" => "required",
                "pan" => "required",
                "reg_no" => "required",
                "logo" => "required",
            ]);

            $company = new Company();
            $company->name = $request->name;
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->pan = $request->pan;
            $company->reg_no = $request->reg_no;
            $company->facebook = $request->facebook;
            $company->youtube = $request->youtube;

            if ($request->hasFile('logo')) {
                $file = $request->logo;
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('images', $fileName);
                $company->logo = "images/" . $fileName;
            }

            $company->save();

            return response()->json([
                "success" => true,
                "message" => "Company Added Successfully"
            ]);


        } catch (ValidationException $e) {
            return response()->json([
                "success" => false,
                "message" => $e->errors()
            ]);
        }
    }
}
