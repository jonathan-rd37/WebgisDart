<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDisasterRequest;
use App\Models\Disaster;

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

    public function editAids()
    {
        return view('admin.edit-aids'); // Render the Edit Aids page
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
}
