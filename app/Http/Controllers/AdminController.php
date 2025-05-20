<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDisasterRequest;
use App\Models\Disaster;
use App\Models\Aid;
use App\Models\MailService;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index');
            } else {
                Auth::logout();
                return redirect('/')->with('error', 'Only for Admin.');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function index()
    {
        return view('admin.index'); // Pastikan file ini ada di resources/views/admin/index.blade.php
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Kembali ke home setelah logout
    }

    public function addDisaster()
    {
        return view('admin.add-disaster'); // Render the Add Disaster page
    }


    public function storeDisaster(StoreDisasterRequest $request)
    {
        // Store disaster data using validated data
        Disaster::create($request->validated());

        return redirect()->route('admin.add-disaster')->with('success', 'Disaster added successfully.');
    }

    public function updateAid(Request $request)
    {
        // Validate the request
        $request->validate([
            'aid_id' => 'required|integer',
            'details' => 'required|string',
        ]);

        // Logic to update aid data
        // Example: Aid::find($request->aid_id)->update(['details' => $request->details]);
        // Assuming you have an Aid model
        return redirect()->route('admin.index')->with('success', 'Aid updated successfully.');
    }
    
    public function deleteDisaster()
    {
        $disasters = Disaster::all(); // Fetch all disasters
        return view('admin.delete-disaster', compact('disasters'));
    }

    public function addAids()
    {
        $disasters = \App\Models\Disaster::all();
        $mailServices = MailService::all();
        return view('admin.add-aids', compact('disasters', 'mailServices'));
    }

    public function storeAids(Request $request)
    {
        $request->validate([
            'disaster_id' => 'required|exists:disasters,id',
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'sender_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:32',
            'tracking_number' => 'required|string|max:255',
            'mail_service_id' => 'required|exists:mail_services,id',
        ]);

        Aid::create([
            'disaster_id' => $request->disaster_id,
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'sender_name' => $request->sender_name,
            'phone_number' => $request->phone_number,
            'tracking_number' => $request->tracking_number,
            'mail_service_id' => $request->mail_service_id,
        ]);

        return redirect()->route('addAids')->with('success', 'Aid added successfully.');
    }

}
