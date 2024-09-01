<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return to index view company.index
        $company = Company::first();
        return view('admin.company.index' , compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return to create view company.create
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // save data to database company.store

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

        toast('Record saved successfully!','success');


        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // view single data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return to edit view company.edit
        $company = Company::find($id);
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update data in database

        $request->validate([
            "name" => "required|max:255",
            "email" => "required|email",
            "phone" => "required|digits:10",
            "address" => "required",
            "pan" => "required",
            "reg_no" => "required",
        ]);

        $company = Company::find($id);
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

        $company->update();
        toast('Record Updated successfully!','success');


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data from database

        $company = Company::find($id);
        unlink(public_path($company->logo));
        $company->delete();
        toast('Record deleted successfully!','success');
        return redirect()->back();
    }
}
